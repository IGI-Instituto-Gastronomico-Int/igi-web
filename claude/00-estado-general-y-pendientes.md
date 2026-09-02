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
