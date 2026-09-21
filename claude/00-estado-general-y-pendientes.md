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

### 2026-09-21 — 3 notas nuevas + 2 ampliaciones + enlazado interno

Medición (GA4, runReport vía Zapier, 2026-08-22 a 2026-09-20, vistas de
página): `/ar/` 11.275, home 5.100, `/py/` 1.203, `/bo/` 214, `/br/` 175,
`/co/` 167, `/cl/` 158, `/uy/` 117. Blog: `metodos-de-coccion-guia` 217,
`alfajor-mas-grande-del-mundo` 193, `/blog/` 153, `cortes-de-verduras` 123,
`brigada-cocina` 102, `diferencias-panaderia-pasteleria-reposteria` 97,
`mise-en-place` 66, `cuanto-cuesta-estudiar-gastronomia-argentina` 59,
`que-estudiar-para-ser-chef-profesional` 58, `cuanto-gana-pastelero-argentina`
52, `como-calcular-costo-plato` 51, `cuanto-dura-carrera-chef` 39,
`ciencia-cocina` 34, `cuanto-gana-barista-argentina` 34 (publicada el 07/09),
`cuanto-gana-chef-argentina` 34, `cuanto-gana-cocinero-paraguay` 29,
`donde-estudiar-gastronomia-argentina` 26, `donde-estudiar-gastronomia-cordoba`
23, `masa-madre` 20, `donde-estudiar-gastronomia-mendoza` 19,
`que-es-tecnologia-de-alimentos-paraguay` 18, `donde-estudiar-gastronomia-bogota`
16, `salsas-madre-cocina-guia` 13 (publicada el 14/09), `cuanto-gana-bartender-argentina`
9, `tecnico-superior-gastronomia-bolivia-que-es` 5. Eventos: `blog_cta_click`
49 (vs. 43 la semana anterior), `whatsapp_click` 3.395, `generate_lead` 332.
Fichas más vistas: `/ar/programas/chef-internacional.html` 375,
`/ar/programas/barista.html` 275, `/ar/programas/abc-chef.html` 238,
`/ar/programas/mozo-maitre.html` 100 (motivo para la nota de mozo);
`/co/programas/cocina-internacional.html` 17.

Publicado (cuerpo real dentro de `<article class="prose">`):
- `blog/cuanto-gana-chef-colombia/` — 2.758 palabras, es-CO, CTA
  `/co/programas/cocina-internacional.html` + `/co/#contacto`. Foto
  `chef-clase-fuego-01`. SMMLV 2026 $1.750.905 + auxilio $249.095 (Decretos
  1469/1470 de 2025, suspensión del Consejo de Estado y Decreto 0159 de 2026),
  promedios por puesto (Computrabajo jun. 2026: cocinero $1.407.138, chef
  cocinero $1.703.087, subchef $1.783.742, chef de restaurante $2.345.932;
  Indeed abr. 2026 chef $1.838.789, Medellín $1.946.547; chef ejecutivo
  $2.576.179–$3.294.954), Ley 1935/2018 de propinas, jornada de 42 h (Ley
  2101) y recargo dominical 90 % (Ley 2466), ejemplo bruto→neto, DANE
  (−109.000 empleos en enero, +289.000 en el año a junio), Decreto 4904/2009.
- `blog/cuanto-gana-mozo-camarero-argentina/` — 2.606 palabras, es-AR, CTA
  `/ar/programas/mozo-maitre.html` + `/ar/#contacto`. Foto `servicio-mozos-01`.
  Niveles del salón en el CCT 389/04 (mozo de mostrador 2, comis de comedor
  3, cajero 5, mozo y maître 6, maître principal 7), básicos jul–sep 2026
  ($1.292.026 D / $1.337.186 C / $1.524.806 Especial + $88.000–$104.000;
  nivel 7 $1.538.297 en B), ejemplo de liquidación, propinas (Decreto 731/2024
  y Ley 27.802 del 6/03/2026: no remunerativas), eventos, plan del curso.
- `blog/fondos-de-cocina-guia/` — 3.349 palabras, es-AR, CTA
  `/ar/programas/chef-internacional.html` + `/ar/#contacto`. Foto
  `chef-coccion-olla-01`. Fondo vs caldo vs consomé, cuatro ingredientes,
  proporciones (1 kg : 2 L; Escoffier 1903 para 10 L), fondo blanco, oscuro,
  fumet, verduras y court-bouillon, glace y demi-glace, reglas de oro, tabla
  de errores, usos, 7 FAQ, 8 fuentes.

Ampliadas: `cuanto-gana-cocinero-paraguay` 1.053 → 2.420 palabras (datos
completos de Sinafocal: 77,4 % de empresas con intención de contratar, 437
vacantes en 25 ocupaciones, 52,6 % en ayudante/cocinero/mozo; tabla del sector
con INE 2T 2024 (876.130 ocupados, 29,5 %), ABC ago. 2026 (+73.575 →
1.063.284), Senatur (97.000 nuevas ocupaciones 2T 2025, 2.252.532 visitantes
ene–sep 2025, 80 % de ocupación hotelera ene. 2026); Código del Trabajo
(recargo nocturno 30 %, extras 50 %/100 %, IPS 9 %, aguinaldo 1/12); ejemplo
bruto→neto ₲ 3.044.000 → ₲ 2.770.040; tabla de puestos; 3 FAQ y 9 fuentes
nuevas; enlaces a Técnico Superior PY, Colombia, brigada, costo de plato);
`donde-estudiar-gastronomia-mendoza` 848 → 2.219 (Vendimia 2026: 41.593
visitantes, $11.714 M, $94.207/día, 85 % de ocupación; enoturismo: 876
bodegas, 209–230 abiertas, 1,59 M visitas 2024, 53,85 % con gastronomía;
tabla de los 16 programas de `ar/mendoza.html` con duración; secciones de
costo, certificación y salida laboral; 3 FAQ nuevas y sección Fuentes con 8
enlaces; meta description reescrita).

Enlazado: `cuanto-gana-mozo-camarero-argentina` recibe 10 entrantes
(`brigada-cocina`, `cuanto-cuesta`, `cuanto-gana-chef-argentina`,
`cuanto-gana-bartender`, `cuanto-gana-barista`, `cuanto-gana-pastelero`,
`curso-mozo-camarera-maitre`, `catering-eventos`, `salida-laboral`,
`diferencias-panaderia`, `donde-estudiar-gastronomia-mendoza`);
`cuanto-gana-chef-colombia` 5 (`brigada-cocina`, `que-estudiar-para-ser-chef`,
`cuanto-gana-chef-argentina`, `donde-estudiar-gastronomia-bogota`,
`salida-laboral`, `cuanto-gana-cocinero-paraguay`); `fondos-de-cocina-guia` 8
(`salsas-madre`, `metodos-de-coccion`, `mise-en-place`, `brigada-cocina`,
`que-estudiar-para-ser-chef`, `cortes-de-verduras`, `cuanto-dura-carrera-chef`,
`materias-chef-internacional`). Desde las notas con tráfico se sumaron además
enlaces a notas sin tráfico: `que-se-aprende-pastelero-internacional`,
`abc-tortas-curso-tortas-clasicas`, `materiales-herramientas-estudiar-pasteleria`,
`chef-internacional-es-para-vos`, `que-se-aprende-curso-parrillas-fuegos`,
`estudiar-gastronomia-sin-experiencia`, `estudiar-chef-internacional-mientras-trabajas`,
y desde Mendoza a `certificado-igi-certificacion-uflo-diferencias`,
`que-revisar-formacion-certificacion-universitaria`, `abc-pastelero-vs-maestro-vs-profesional`,
`como-es-clase-chef-internacional-igi`, `curso-cocina-o-carrera-chef`.

Índice, feed y sitemap actualizados (3 tarjetas/ítems nuevos arriba; sitemap
con 272 URLs y `lastmod` 2026-09-21 en las 23 notas tocadas). Se acortó la
meta description de `blog/index.html` (170 → 162 caracteres), pendiente desde
la corrida anterior. Banco de fotos: quedan 51 sin usar.

Fuentes verificadas por búsqueda web el 2026-09-21 (los dominios .com.ar,
.com.co, .com.py, .gov.py, .gob.ar, computrabajo, scoolinary, wikisource y
mendoza.gov.ar no se pueden abrir desde el entorno; se usaron los resúmenes
de búsqueda con cifras citadas): Computrabajo/Indeed/Magneto365 Colombia,
Impera Abogados y Consultorsalud (SMMLV 2026), Siigo y SUIN-Juriscol (Ley
1935), Actualícese y Portafolio (jornada y recargos 2026), El Colombiano y El
Tiempo (DANE), Función Pública (Decreto 4904); Vilaplana (categorías CCT
389/04: mozo y maître en nivel 6), Atril, Perfil, El Sindicato, Restaurant
Argentina, Boletín Oficial (Decreto 731/2024), Argentina.gob.ar,
Abogados.com.ar (Ley 27.802); Wikisource Escoffier 1903, Scoolinary,
Gastronosfera, ABC Color gastronomía, Culinaria Mexicana, USDA FSIS; Los
Andes, Sitio Andino, ADN País, Prensa Mendoza, MDZ, Diario Uno, UTHGRA
Mendoza; Agencia IP, MarketData, ABC Color economía, Senatur, La Tribuna,
TopTrabajos, Lenox HR, Vacantes.com.

Hallazgo: la nota de brigada de cocina decía que mozo y maître "comparten
nivel con el cocinero y el jefe de partida", y las guías consultadas lo
confirman (nivel 6); el mozo de mostrador está en el nivel 2 y el comis de
comedor en el 3, no en el 5 como se podía inferir del backlog.

Pendiente: segunda nota de Colombia (`tecnico-laboral-cocina-internacional-colombia-que-es`),
ampliar `que-es-tecnologia-de-alimentos-paraguay` (406 palabras, 18 vistas) y
`masa-madre-tendencia-panaderia`; `br/` sigue en portugués sin filial
confirmada; revisar `llms.txt` para sumar las notas de sueldos.

### 2026-09-14 — 3 notas nuevas + 2 ampliaciones + enlazado interno

Medición (GA4, runReport vía Zapier, 2026-08-15 a 2026-09-13, vistas de
página): `/ar/` 9.300, home 7.541, `/py/` 987, `/bo/` 165, `/co/` 147,
`/cl/` 138, `/br/` 133. Blog: `alfajor-mas-grande-del-mundo` 144,
`metodos-de-coccion-guia` 144, `cortes-de-verduras` 84,
`diferencias-panaderia-pasteleria-reposteria` 78, `brigada-cocina` 76,
`mise-en-place` 55, `cuanto-cuesta-estudiar-gastronomia-argentina` 43,
`que-estudiar-para-ser-chef-profesional` 41, `cuanto-gana-pastelero-argentina`
39, `como-calcular-costo-plato` 34, `cuanto-dura-carrera-chef` 25,
`cuanto-gana-chef-argentina` 23, `cuanto-gana-cocinero-paraguay` 23,
`donde-estudiar-gastronomia-cordoba` 15, `cuanto-gana-barista-argentina` 7
(publicada el 07/09), `donde-estudiar-gastronomia-bogota` 4. Eventos:
`blog_cta_click` 43 (vs. 32 la semana anterior), `whatsapp_click` 3.504,
`generate_lead` 345. Fichas más vistas: `/ar/programas/chef-internacional.html`
277, `/ar/programas/barista.html` 192, `/ar/programas/bartender.html` 88.
El diagnóstico de la consigna (cuanto-cuesta con 536 palabras) ya estaba
resuelto el 07/09: hoy tiene 1.994 palabras de cuerpo y 43 vistas.

Publicado (cuerpo real dentro de `<article class="prose">`):
- `blog/cuanto-gana-bartender-argentina/` — 2.377 palabras, es-AR, CTA
  `/ar/programas/bartender.html` + `/ar/#contacto`. Foto `cocteleria-clase-01`.
  Barman nivel 6 ($1.292.026 D / $1.524.806 Especial + $88.000–$104.000),
  ayudante nivel 3, ejemplo de liquidación, propinas (iProfesional 2026),
  World's 50 Best Bars 2025 (Tres Monos 10, CoChinChina 26, Florería
  Atlántico 90).
- `blog/tecnico-superior-gastronomia-bolivia-que-es/` — 2.585 palabras,
  es-BO, CTA `/bo/programas/tecnico-superior.html` + `/bo/#contacto`. Foto
  `alumnos-practica-mesada-01`. Niveles Técnico Medio/Superior (Ministerio de
  Educación, R.M. 350/2023), R.M. 0882/2022, plan de 3 años, comparativa con
  Chef Internacional y cursos, INE turismo 2025 (2,65 M visitantes, 1.145.165
  extranjeros, 27 % del gasto en alimentos y bebidas), SMN 2026 Bs 3.300 (D.S.
  5516). Sede La Paz; Santa Cruz sigue sin ficha.
- `blog/salsas-madre-cocina-guia/` — 2.785 palabras, es-AR, CTA
  `/ar/programas/chef-internacional.html` + `/ar/#contacto`. Foto
  `emplatado-salsa-01`. Carême/Escoffier, fondos y roux con proporciones,
  las 5 salsas con derivadas, tabla resumen, errores y correcciones.

Ampliadas: `cuanto-gana-pastelero-argentina` 891 → 1.893 palabras (tabla
niveles 3/5/6 por categoría D y Especial, ejemplo de liquidación, sección
sobre el CCT 272/96 de pastelerías con el acuerdo abril–octubre 2026 del
Sindicato de Pasteleros, evolución de la carrera, 3 FAQ y 5 fuentes nuevas);
`donde-estudiar-gastronomia-cordoba` 506 → 2.125 (cifras de la Agencia
Córdoba Turismo: +2 M turistas verano 2026, $273.000 M, 70,33 % ocupación,
378 mil turistas en invierno; tabla de las 5 filiales `ar/cordoba.html`,
`villa-carlos-paz`, `rio-cuarto`, `villa-dolores`, `marcos-juarez`; tabla de
los 16 programas AR con duración; costo, certificación, salida laboral,
checklist, 6 FAQ, 6 fuentes; CTAs corregidos a `/ar/cordoba.html` +
`/ar/#contacto`).

Enlazado: `cuanto-gana-bartender-argentina` recibe 8 entrantes
(`brigada-cocina`, `cuanto-cuesta`, `cuanto-gana-barista`,
`cuanto-gana-pastelero`, `que-hace-bartender-profesional`,
`que-se-aprende-curso-bartender`, `salida-laboral-gastronomia-trabajos`,
`donde-estudiar-gastronomia-cordoba`); `tecnico-superior-gastronomia-bolivia-que-es`
4 (`que-estudiar-para-ser-chef-profesional`, `donde-estudiar-gastronomia-bolivia`,
`donde-estudiar-gastronomia-la-paz-bolivia`, `cuanto-dura-carrera-chef`);
`salsas-madre-cocina-guia` 7 (`metodos-de-coccion-guia`, `cortes-de-verduras`,
`mise-en-place`, `brigada-cocina`, `que-estudiar-para-ser-chef-profesional`,
`ciencia-cocina`, `emplatado-profesional`). Desde las 6 notas con tráfico se
agregaron además enlaces a notas del cluster sin tráfico:
`manipulacion-segura-alimentos-claves`, `emplatado-profesional-tecnicas-errores`,
`cocina-sostenible-reducir-desperdicios`, `como-es-clase-chef-internacional-igi`,
`catering-eventos-planificar-producir-servir`, `curso-mozo-camarera-maitre-servicio-profesional`,
`que-hace-bartender-profesional`, `abc-panadero-curso-panificacion-inicial`,
`abc-pastelero-curso-inicial-pasteleria`, `diseno-tortas-curso-decoracion`,
`masa-madre-tendencia-panaderia`, `estudiar-pasteleria-para-emprender`,
`pasteleria-clasica-superior-vanguardia`, `materias-chef-internacional`,
`especializaciones-gastronomicas-como-elegir`.

Índice, feed y sitemap actualizados (3 tarjetas/ítems nuevos arriba; sitemap
con 269 URLs únicas y `lastmod` 2026-09-14 en las 22 notas tocadas). También
se acortaron las meta descriptions de `alumnos-igi-record-guinness-alfajor`
(180 → 148) y `como-escalar-receta-pasteleria-alfajor-gigante` (174 → 159),
que superaban los 165 caracteres desde la corrida anterior.

Fuentes verificadas por búsqueda web el 2026-09-14 (los dominios .com.ar,
.bo y minedu.gob.bo no se pueden abrir desde el entorno; se usaron los
resúmenes de búsqueda con cifras citadas): escala UTHGRA jul–sep 2026 nivel 6
$1.292.026 (D) / $1.524.806 (Especial) + $88.000 / $104.000, nivel 3
$1.099.139 / $1.342.334, nivel 5 $1.210.980 + $83.000, referencia intermedia
Perfil $1.337.186 + $91.000 (Atril, Perfil, El Sindicato, Vilaplana);
iProfesional bartender $900.000–$1.200.000 con propinas; Sindicato de
Pasteleros CCT 272/96 acuerdo abril–octubre 2026 (2,5 % → 15,97 %, 15,97 % al
básico en octubre, antigüedad 2 %–19 %); INE Bolivia 2025 vía La Patria y
eju.tv; D.S. 5516 y R.M. 088/26 (Unitel, Ferrere); Agencia Córdoba Turismo vía
prensa.cba.gov.ar, Hoy Día, Dailyweb y El Diario de Carlos Paz; Circuito
Gastronómico 13.073 votos.

Hallazgos del repo: `ar/index.html` y `bo/index.html` son SPA con vistas
(`id="v-contacto"`) y no tienen `id="contacto"`; los enlaces `/{pais}/#contacto`
dependen del router por hash, igual que en todas las notas anteriores.
`br/` sigue en portugués con filiales "em breve": no se escribió nota de
Brasil. `blog/index.html` conserva enlaces `/#contacto` de raíz y una meta
description de 170 caracteres (preexistentes, no se tocaron). Banco de fotos:
quedan 54 sin usar.

Pendiente: nota de Colombia (7 fichas, 1 sola nota), ampliar
`donde-estudiar-gastronomia-mendoza`, `masa-madre-tendencia-panaderia` y
`cuanto-gana-cocinero-paraguay`; `fondos-de-cocina-guia` como continuación de
salsas madre; revisar `llms.txt` para sumar las notas de sueldos.


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
