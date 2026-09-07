# Estado general y pendientes — Página web de IGI

> Archivo creado el 2026-09-02 por la rutina semanal del blog, porque el
> repo no lo tenía versionado. Reglas reconstruidas a partir de la
> consigna de la rutina y de las notas ya publicadas.

## Reglas permanentes

1. Nunca tocar ni borrar `CNAME` ni `google7c95af54c2fa6355.html`.
2. Estructura de nota: copiar `blog/cuanto-gana-cocinero-paraguay/index.html`
   (canonical, BlogPosting + BreadcrumbList, OG/Twitter, TOC escritorio y
   móvil, answer-box, FAQ, author-box, cta-final, sección Fuentes, related).
3. Analítica obligatoria en cada nota: GA4 `G-2H24GS3HKH` + Clarity
   `y1n5mo1dsk`, con el evento `blog_cta_click` sobre `.cta-final a`.
4. Enlaces internos solo a URLs reales del repo (`/{pais}/programas/x.html`,
   `/{pais}/ciudad.html`, `/filiales/`, `/blog/slug/`). Nunca hashes de raíz
   (`/#prog=`, `/#contacto`). El `lang`/`og:locale` debe coincidir con el
   país de los CTAs (es-AR ↔ `/ar/`, es-PY ↔ `/py/`).
5. Datos de sueldos, demanda o mercado: fuente enlazada con fecha. Sin
   fuente, no se afirma. Nunca inventar cifras.
6. Imágenes héroe: 16:9, 1200 y 800 px, jpg q82 + webp q80, dentro de la
   carpeta de la nota, sin repetir héroes de otras notas.
7. Al publicar: tarjetas nuevas arriba en `blog/index.html`, ítems nuevos
   arriba en `blog/feed.xml`, entradas en `sitemap.xml` con `lastmod`.
8. Verificación previa: JSON-LD válido, un solo h1, meta description de
   70 a 165 caracteres, enlaces e imágenes existentes, cero directivas
   internas filtradas al texto.
9. Publicar en `main`; si el push es rechazado, rama `claude/blog-<fecha>` + PR.

## Resumen de corridas

### 2026-09-07 — 3 notas nuevas + 2 ampliaciones + enlazado interno

Medición (GA4, runReport vía Zapier, 2026-08-08 a 2026-09-06, vistas de
página): home 7.430, `/ar/` 6.814, `/py/` 699. Blog: `/blog/` 66,
`metodos-de-coccion-guia` 73, `brigada-cocina-puestos-funciones` 61,
`diferencias-panaderia-pasteleria-reposteria` 60, `cortes-de-verduras` 34,
`mise-en-place` 34, `cuanto-cuesta-estudiar-gastronomia-argentina` 30,
`que-estudiar-para-ser-chef-profesional` 30, `como-calcular-costo-plato` 22,
`cuanto-dura-carrera-chef` 18, `cuanto-gana-pastelero-argentina` 17,
`cuanto-gana-chef-argentina` 16. Evento `blog_cta_click`: 32 en 30 días
(`whatsapp_click` 3.047, `generate_lead` 300). Fichas de programa más vistas:
`/ar/programas/chef-internacional.html` 185, `/ar/programas/barista.html` 114
(motivo para priorizar la nota de sueldo de barista).

Publicado (cuerpo real dentro de `<article class="prose">`):
- `blog/cuanto-gana-barista-argentina/` — 2.243 palabras, es-AR, CTA
  `/ar/programas/barista.html` + `/ar/#contacto`. Foto `barista-portafiltro-01`.
- `blog/donde-estudiar-gastronomia-bogota/` — 2.419 palabras, es-CO, CTA
  `/co/programas/cocina-internacional.html` + `/co/#contacto`. Foto
  `aula-clase-cocina-01`.
- `blog/chocolateria-profesional-que-se-aprende/` — 2.590 palabras, es-AR,
  CTA `/ar/programas/pastelero-internacional.html` + `/ar/#contacto`. Foto
  `pasteleria-petit-fours-01`.

Ampliadas: `cuanto-cuesta-estudiar-gastronomia-argentina` 536 → 2.043
palabras (qué incluye la cuota en IGI, tabla de duraciones de los 16
programas AR, inflación INDEC jul-2026, tabla de básicos de convenio,
checklist de preguntas, FAQ, fuentes); `salida-laboral-gastronomia-trabajos`
689 → 1.987 (sector en números FEHGRA/Fundar, tabla de niveles del convenio,
consejos de contratación, FAQ, fuentes).

Enlazado: las 3 nuevas reciben enlaces contextuales desde
`que-estudiar-para-ser-chef-profesional`, `brigada-cocina-puestos-funciones`,
`metodos-de-coccion-guia`, `mise-en-place-que-es-como-hacerla`,
`diferencias-panaderia-pasteleria-reposteria`, `que-hace-barista-profesional`,
`cafe-de-especialidad-2026`, `donde-estudiar-gastronomia-bolivia`,
`que-estudiar-para-ser-pastelero-profesional`, `donde-estudiar-gastronomia-argentina`
y las 2 ampliadas (mínimo 5 entrantes por nota nueva). Desde las 6 notas con
tráfico se agregaron además enlaces a notas del cluster sin tráfico:
`que-hace-chef-privado`, `primer-segundo-ano-chef-internacional`,
`como-controlar-fuego-temperatura-parrilla`, `cortes-puntos-coccion-reposo-parrilla`,
`ciencia-cocina-quimica-fisica-microbiologia`, `manipulacion-segura-alimentos-claves`,
`emplatado-profesional-tecnicas-errores`, `abc-pastelero-vs-maestro-vs-profesional`,
`que-se-estudia-panaderia-profesional`, `donde-estudiar-gastronomia-cordoba`,
`conviene-estudiar-gastronomia`, `donde-estudiar-gastronomia-rosario`,
`donde-estudiar-gastronomia-mendoza`.

Índice, feed y sitemap actualizados (3 tarjetas/ítems nuevos arriba; sitemap
con 262 URLs únicas y `lastmod` 2026-09-07 en las 15 notas tocadas).

Fuentes clave verificadas por búsqueda web el 2026-09-07 (la mayoría de los
dominios no se pueden abrir desde el entorno; se usaron los resúmenes de
búsqueda con cifras citadas): escala UTHGRA jul–sep 2026 nivel 3 (cafetero)
$1.099.139 / $1.220.868 / $1.342.334 + $75.000 / $83.000 / $92.000 (Atril,
El Sindicato); Cámara Argentina de Café 138 → 208 tazas/hab 2014–2024;
FEHGRA 650.000 puestos, 67.000 establecimientos gastronómicos; Fundar 1,2 M
ocupados en turismo 2022; INDEC IPC jul-2026 2,1 % / 33,8 % i.a.; Colombia
SMMLV 2026 $1.750.905 + $249.095 (Decretos 1469/1470 de 2025), Acodrés >1,2 M
empleos y >80.000 locales en Bogotá, DANE +143.000 ocupados 2025, Computrabajo
cocinero $1.407.138; Decreto 4904/2009; Callebaut curvas de templado; ICCO
precios cacao 2024–2026.

Hallazgos del repo: `co/chapinero-bogota.html` y `co/chia.html` son
redirecciones a `/co/` (no fichas). `br/` está en portugués y su única
filial figura "Em breve": no se escribió nota de Brasil. El banco de fotos
tenía las 60 fotos sin usar (la consigna hablaba de ~24); ahora quedan 57.
No hay PIL ni ImageMagick en el entorno: las fotos del banco ya vienen
procesadas (1200/800, jpg+webp, 16:9), sólo se copiaron y renombraron.

Pendiente: seguir ampliando notas cortas (lista en el backlog), nota de
bartender AR con las mismas cifras, y revisar si `llms.txt` debe listar las
notas de sueldos.

### 2026-09-02 — publicación de 3 notas (recuperadas de la corrida del 31/08)

Situación encontrada: la corrida del 2026-08-31 había redactado 3 notas, pero
se subieron a mano al repo (commits "Add files via upload") y quedaron
sueltas en la raíz: `index (1).html`, `index (2).html`, `index (3).html`,
`feed.xml` y las 12 imágenes héroe. La tercera nota (pastelero) había
sobrescrito temporalmente `index.html` de la home (luego restaurada) y solo
quedaba en la historia de git. El `sitemap.xml` ya apuntaba a las 3 URLs,
que devolvían 404. `claude/` no existía en el repo.

Hecho:
- `blog/cuanto-gana-pastelero-argentina/` (recuperada de `git show b42837d:index.html`).
- `blog/cocteleria-sin-alcohol-tendencia/` y `blog/cafe-de-especialidad-2026/`
  (movidas desde la raíz; se corrigió `lang`/`og:locale`/`inLanguage` a es-PY
  para que coincidan con los CTAs a `/py/`).
- Imágenes héroe movidas a la carpeta de cada nota (1200/800, jpg + webp).
- `blog/index.html` y `blog/feed.xml` reemplazados por las versiones con las
  3 tarjetas/ítems nuevos; `sitemap.xml` con `lastmod` del índice actualizado.
- Raíz limpia: eliminados `index (1..3).html` y `feed.xml` sueltos.
- Cifras re-verificadas por búsqueda web el 2026-09-02: escala UTHGRA
  jul–sep 2026 (cat. 5 $1.210.980, cat. 6 $1.292.026–$1.524.806,
  gratificaciones $83.000–$104.000, acuerdo 24/07/2026 en homologación,
  adicionales 10/10/12 %), IWSR ene. 2026 (+9 % 2025, +36 % 2024–2029,
  10 mercados incl. Brasil, 7.973 encuestados, 37–40 % salud), NCA 2023
  (52 % / 62 % en 25–39), citas de Fine Dining Lovers y Dalla Corte.
- Creados `claude/backlog-temas-blog.md` y este archivo.

Pendiente / a decidir por el equipo:
- Confirmar el orden del backlog propuesto (no había backlog en el repo).
- Si se quería que las 2 notas de tendencia apunten a Argentina en vez de
  Paraguay, cambiar CTAs y `lang` juntos.
- `llms.txt` podría sumar la nota de sueldo de pastelero.
