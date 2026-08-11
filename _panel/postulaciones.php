<?php
/**
 * Endpoint autónomo de Postulaciones ("Trabajá con nosotros").
 * Portal Base de Conocimientos IGI.
 *
 * Se sube a la MISMA carpeta que lib.php y api.php del panel. NO modifica ningún
 * archivo existente: se llega directo como archivo.
 *
 *   POST  /postulaciones.php                  → recibir una postulación (público, con CV)
 *   GET   /postulaciones.php?accion=listar     → listar (con sesión, filtrado por sede)
 *   GET   /postulaciones.php?accion=cv&id=…     → descargar el CV (con sesión + scope)
 *   POST  /postulaciones.php?accion=estado      → cambiar estado / nota (con sesión + scope)
 *
 * Reutiliza las funciones de lib.php: db_leer, db_guardar, responder, cuerpo,
 * exigir_sesion, usuario_actual, auditar, id_nuevo, enviar_mail.
 *
 * Los CVs se guardan en datos/cv/ (misma carpeta protegida que db.json, fuera del
 * alcance del navegador). Listar y descargar exigen sesión y respetan el rol:
 * administración central ve todo; una filial ve solo las postulaciones de su sede.
 */

require __DIR__ . '/lib.php';

$__accion = $_GET['accion'] ?? '';
$__pm     = $_SERVER['REQUEST_METHOD'];

// ── Mapa: id de filial del sitio (web3) → id de sede del panel ───────────────
// Generado a partir de las filiales del sitio y las sedes del panel. Sin sede
// asignada: 'merlosanluis' y 'saopaulo' (placeholder Brasil) → los ve solo central.
$POST_MAP_FILIAL_SEDE = [
    'asuncion' => 'pa-asuncion',
    'bahiablanca' => 'ar-bahia-blanca',
    'bariloche' => 'ar-bariloche',
    'belgrano' => 'ar-belgrano',
    'berazategui' => 'ar-berazategui',
    'centro' => 'ur-centro',
    'chapinerobogota' => 'co-chapinero',
    'chia' => 'co-chia',
    'ciudaddeleste' => 'pa-ciudad-del-este',
    'comodororivadavia' => 'ar-comodoro-rivadavia',
    'congreso' => 'ar-congreso',
    'cordoba' => 'ar-cordoba',
    'coroneloviedo' => 'pa-coronel-oviedo',
    'corrientes' => 'ar-corrientes',
    'encarnacion' => 'pa-encarnacion',
    'ezeiza' => 'ar-ezeiza',
    'florenciovarela' => 'ar-florencio-varela',
    'flores' => 'ar-flores',
    'formosa' => 'ar-formosa',
    'gonzalezcatan' => 'ar-gonzalez-catan',
    'grandbourg' => 'ar-grand-bourg',
    'josecpaz' => 'ar-jose-c-paz',
    'junin' => 'ar-junin',
    'laferrere' => 'ar-laferrere',
    'lambare' => 'pa-lambare',
    'lanus' => 'ar-lanus',
    'lapaz' => 'bo-la-paz',
    'laplata' => 'ar-la-plata',
    'liniers' => 'ar-liniers',
    'lomasdezamora' => 'ar-lomas-de-zamora',
    'luque' => 'pa-luque',
    'marcosjuarez' => 'ar-marcos-juarez',
    'mardelplata' => 'ar-mar-del-plata',
    'mendoza' => 'ar-mendoza',
    'merlo' => 'ar-merlo',
    'montegrande' => 'ar-monte-grande',
    'moreno' => 'ar-moreno',
    'moron' => 'ar-moron',
    'neuquen' => 'ar-neuquen',
    'obera' => 'ar-obera',
    'pacheco' => 'ar-pacheco',
    'parana' => 'ar-parana',
    'pilar' => 'ar-pilar',
    'pocitos' => 'ur-pocitos',
    'pompeya' => 'ar-pompeya',
    'posadas' => 'ar-posadas',
    'providencia' => 'ch-providencia',
    'puentealto' => 'ch-puente-alto',
    'puertomadryn' => 'ar-puerto-madryn',
    'quilmes' => 'ar-quilmes',
    'resistencia' => 'ar-resistencia',
    'restrepobogota' => 'co-rafael-uribe-uribe',
    'riocuarto' => 'ar-rio-cuarto',
    'rosario' => 'ar-rosario',
    'salta' => 'ar-salta',
    'sanfernando' => 'ar-san-fernando',
    'sanisidro' => 'ar-san-isidro',
    'sanjuan' => 'ar-san-juan',
    'sanjusto' => 'ar-san-justo',
    'sanlorenzo' => 'pa-san-lorenzo',
    'sanmartin' => 'ar-san-martin',
    'sanmiguel' => 'ar-san-miguel',
    'santacruz' => 'bo-santa-cruz-de-la-sierra',
    'santafe' => 'ar-santa-fe',
    'santiagocentro' => 'ch-santiago-centro',
    'smdetucuman' => 'ar-tucuman',
    'ssdejujuy' => 'ar-san-salvador-de-jujuy',
    'vicentelopez' => 'ar-vicente-lopez',
    'villacarlospaz' => 'ar-villa-carlos-paz',
    'villadolores' => 'ar-villa-dolores',
    'villaurquiza' => 'ar-villa-urquiza',
    'zarate' => 'ar-zarate',
];

// ── Utilidades del módulo ───────────────────────────────────────────────────
function pos_dir_cv() {
    $base = is_dir(__DIR__ . '/../datos') ? __DIR__ . '/../datos' : __DIR__ . '/datos';
    $dir = $base . '/cv';
    if (!is_dir($dir)) @mkdir($dir, 0700, true);
    // Refuerzo por si la carpeta llega a quedar dentro del webroot.
    $ht = $base . '/.htaccess';
    if (!file_exists($ht)) @file_put_contents($ht, "Require all denied\nDeny from all\n");
    return $dir;
}

function pos_cors() {
    $orig = $_SERVER['HTTP_ORIGIN'] ?? '';
    $permitidos = [
        'https://web3.igionline.com.ar',
        'https://igionline.com.ar',
        'https://www.igionline.com.ar',
    ];
    if (in_array($orig, $permitidos, true)) {
        header('Access-Control-Allow-Origin: ' . $orig);
        header('Vary: Origin');
        header('Access-Control-Allow-Methods: POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type');
    }
}

function pos_html_aviso($r) {
    $n = htmlspecialchars($r['nombre']);
    $e = htmlspecialchars($r['email']);
    $t = htmlspecialchars($r['telefono']);
    $a = htmlspecialchars(implode(', ', $r['areas'] ?? []));
    $f = htmlspecialchars(implode(' · ', $r['filiales_nombres'] ?? []));
    $m = nl2br(htmlspecialchars($r['mensaje'] ?? ''));
    $li = $r['linkedin'] ? '<p><b>LinkedIn/CV:</b> ' . htmlspecialchars($r['linkedin']) . '</p>' : '';
    return '<div style="font-family:Segoe UI,Arial,sans-serif;color:#1a2430">'
        . '<h2 style="color:#c96d18">Nueva postulación</h2>'
        . "<p><b>Nombre:</b> $n</p><p><b>Email:</b> $e</p><p><b>Tel:</b> $t</p>"
        . "<p><b>Áreas:</b> $a</p><p><b>Filiales:</b> $f</p>$li"
        . ($m ? "<p><b>Mensaje:</b><br>$m</p>" : '')
        . ($r['cv_archivo'] ? '<p><b>CV adjunto:</b> sí (verlo en el panel → Postulaciones)</p>' : '')
        . '<p style="color:#67788a;font-size:13px">Entrá al panel para gestionarla.</p></div>';
}

// ── Preflight CORS ──────────────────────────────────────────────────────────
if ($__pm === 'OPTIONS') { pos_cors(); http_response_code(204); exit; }

// ── POST público: recibir una postulación ───────────────────────────────────
if ($__pm === 'POST' && $__accion === '') {
    pos_cors();

    $es_multipart = !empty($_POST) || !empty($_FILES);
    if ($es_multipart) {
        $b = $_POST;
        $areas    = isset($b['areas'])    ? (json_decode($b['areas'], true)    ?: (array)$b['areas'])    : [];
        $filiales = isset($b['filiales']) ? (json_decode($b['filiales'], true) ?: (array)$b['filiales']) : [];
        $fnombres = isset($b['filiales_nombres']) ? (json_decode($b['filiales_nombres'], true) ?: []) : [];
    } else {
        $b = cuerpo();
        $areas    = $b['areas'] ?? [];
        $filiales = $b['filiales'] ?? [];
        $fnombres = $b['filiales_nombres'] ?? [];
    }

    // Honeypot anti-bots: si viene relleno, fingimos éxito y no guardamos.
    if (!empty($b['website']) || !empty($b['_hp'])) responder(['ok' => true]);

    $nombre = trim($b['nombre'] ?? '');
    $email  = trim($b['email'] ?? '');
    $tel    = trim($b['telefono'] ?? '');
    if ($nombre === '' || $email === '' || $tel === '') responder(['error' => 'Faltan datos obligatorios.'], 400);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) responder(['error' => 'El email no es válido.'], 400);
    if (!$areas) responder(['error' => 'Elegí al menos un área.'], 400);
    if (!$filiales) responder(['error' => 'Elegí al menos una filial.'], 400);

    // CV opcional (PDF o Word, hasta 8 MB), guardado fuera del webroot.
    $cv_archivo = null; $cv_original = null;
    if (!empty($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
        $fcv = $_FILES['cv'];
        if ($fcv['size'] > 8 * 1024 * 1024) responder(['error' => 'El CV supera los 8 MB.'], 400);
        $ext = strtolower(pathinfo($fcv['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, ['pdf', 'doc', 'docx'], true)) responder(['error' => 'El CV debe ser PDF o Word.'], 400);
        if (function_exists('finfo_open')) {
            $mime = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $fcv['tmp_name']);
            $ok = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/zip'];
            if ($mime && !in_array($mime, $ok, true)) responder(['error' => 'El contenido del CV no es un PDF ni un Word.'], 400);
        }
        $dir = pos_dir_cv();
        if (!is_writable($dir)) responder(['error' => 'La carpeta datos/cv no tiene permiso de escritura.'], 500);
        $cv_archivo = bin2hex(random_bytes(8)) . '.' . $ext;
        if (!move_uploaded_file($fcv['tmp_name'], "$dir/$cv_archivo")) responder(['error' => 'No se pudo guardar el CV.'], 500);
        @chmod("$dir/$cv_archivo", 0600);
        $cv_original = $fcv['name'];
    }

    // Filiales del sitio → sedes del panel (para el filtrado por sede).
    global $POST_MAP_FILIAL_SEDE;
    $sedes = [];
    foreach ((array)$filiales as $fid) {
        if (isset($POST_MAP_FILIAL_SEDE[$fid])) $sedes[] = $POST_MAP_FILIAL_SEDE[$fid];
    }
    $sedes = array_values(array_unique($sedes));

    $db = db_leer();
    if (!isset($db['postulaciones'])) $db['postulaciones'] = [];
    $reg = [
        'id'               => id_nuevo('POS'),
        'nombre'           => mb_substr($nombre, 0, 160),
        'email'            => mb_substr($email, 0, 160),
        'telefono'         => mb_substr($tel, 0, 60),
        'linkedin'         => mb_substr(trim($b['linkedin'] ?? ''), 0, 255),
        'areas'            => array_map(fn($x) => mb_substr((string)$x, 0, 120), (array)$areas),
        'filiales'         => array_values((array)$filiales),
        'filiales_nombres' => array_values((array)$fnombres),
        'sedes'            => $sedes,
        'mensaje'          => mb_substr(trim($b['mensaje'] ?? ''), 0, 4000),
        'cv_archivo'       => $cv_archivo,
        'cv_original'      => $cv_original,
        'estado'           => 'nuevo',
        'notas'            => [],
        'ip'               => $_SERVER['REMOTE_ADDR'] ?? null,
        'ts'               => date('c'),
    ];
    array_unshift($db['postulaciones'], $reg);
    auditar($db, 'postulacion', $nombre . ' → ' . (implode(', ', $sedes) ?: '(sin sede)'));
    db_guardar($db);

    // Aviso por email a administración central (best-effort, no bloquea).
    try {
        $rrhh = $db['institucion']['rrhh_email'] ?? ($db['institucion']['correo']['remitente'] ?? null);
        if ($rrhh) enviar_mail($db, $rrhh, 'Nueva postulación — ' . $nombre, pos_html_aviso($reg));
    } catch (\Throwable $e) { /* silencioso */ }

    responder(['ok' => true, 'id' => $reg['id']]);
}

// ── GET lista (sesión, con filtrado por sede) ───────────────────────────────
if ($__pm === 'GET' && $__accion === 'listar') {
    $u = exigir_sesion();
    $db = db_leer();
    $es_admin = ($u['rol'] ?? '') === 'admin';
    $mi_sede  = $u['sede_id'] ?? null;
    $estadoF  = $_GET['estado'] ?? '';
    $q        = trim($_GET['q'] ?? '');

    $items = [];
    foreach ($db['postulaciones'] ?? [] as $p) {
        if (!$es_admin) {
            if (!$mi_sede || !in_array($mi_sede, $p['sedes'] ?? [], true)) continue;
        }
        if ($estadoF !== '' && ($p['estado'] ?? '') !== $estadoF) continue;
        if ($q !== '' && stripos($p['nombre'] . ' ' . $p['email'], $q) === false) continue;
        $items[] = [
            'id'               => $p['id'],
            'nombre'           => $p['nombre'],
            'email'            => $p['email'],
            'telefono'         => $p['telefono'],
            'linkedin'         => $p['linkedin'] ?? null,
            'areas'            => $p['areas'] ?? [],
            'filiales_nombres' => $p['filiales_nombres'] ?? [],
            'sedes'            => $p['sedes'] ?? [],
            'mensaje'          => $p['mensaje'] ?? '',
            'estado'           => $p['estado'] ?? 'nuevo',
            'cv'               => !empty($p['cv_archivo']),
            'notas'            => $p['notas'] ?? [],
            'ts'               => $p['ts'] ?? null,
        ];
    }
    responder(['total' => count($items), 'items' => $items]);
}

// ── GET descarga del CV (sesión, con scope) ─────────────────────────────────
if ($__pm === 'GET' && $__accion === 'cv') {
    $u = exigir_sesion();
    $db = db_leer();
    $id = $_GET['id'] ?? '';
    foreach ($db['postulaciones'] ?? [] as $p) {
        if ($p['id'] !== $id) continue;
        $es_admin = ($u['rol'] ?? '') === 'admin';
        if (!$es_admin && !in_array($u['sede_id'] ?? '', $p['sedes'] ?? [], true))
            responder(['error' => 'No tenés acceso a esta postulación.'], 403);
        if (empty($p['cv_archivo'])) responder(['error' => 'Esta postulación no tiene CV.'], 404);
        $ruta = pos_dir_cv() . '/' . $p['cv_archivo'];
        if (!is_file($ruta)) responder(['error' => 'Archivo no encontrado.'], 404);
        $ext = strtolower(pathinfo($p['cv_archivo'], PATHINFO_EXTENSION));
        $mime = $ext === 'pdf' ? 'application/pdf'
              : ($ext === 'docx' ? 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
              : 'application/octet-stream');
        header('Content-Type: ' . $mime);
        header('Content-Disposition: inline; filename="CV-' . preg_replace('/[^A-Za-z0-9]+/', '-', $p['nombre']) . '.' . $ext . '"');
        header('X-Content-Type-Options: nosniff');
        readfile($ruta);
        exit;
    }
    responder(['error' => 'No existe.'], 404);
}

// ── POST cambiar estado / agregar nota (sesión, con scope) ──────────────────
if ($__pm === 'POST' && $__accion === 'estado') {
    $u = exigir_sesion();
    $b = cuerpo();
    $id = $b['id'] ?? '';
    $estado = $b['estado'] ?? '';
    $validos = ['nuevo', 'en_revision', 'entrevista', 'contratado', 'descartado'];
    if (!in_array($estado, $validos, true)) responder(['error' => 'Estado inválido.'], 400);
    $db = db_leer();
    if (!isset($db['postulaciones'])) $db['postulaciones'] = [];
    foreach ($db['postulaciones'] as $i => $p) {
        if ($p['id'] !== $id) continue;
        $es_admin = ($u['rol'] ?? '') === 'admin';
        if (!$es_admin && !in_array($u['sede_id'] ?? '', $p['sedes'] ?? [], true))
            responder(['error' => 'No tenés acceso a esta postulación.'], 403);
        $db['postulaciones'][$i]['estado'] = $estado;
        if (!empty($b['nota'])) {
            $db['postulaciones'][$i]['notas'][] = ['usuario' => $u['usuario'], 'nota' => mb_substr($b['nota'], 0, 500), 'ts' => date('c')];
        }
        auditar($db, 'postulacion-estado', $p['nombre'] . ' → ' . $estado);
        db_guardar($db);
        responder(['ok' => true]);
    }
    responder(['error' => 'No existe.'], 404);
}

// Acción no reconocida.
responder(['error' => 'Acción no reconocida.'], 404);
