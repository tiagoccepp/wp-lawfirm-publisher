# wp-lawfirm-publisher

Custom WordPress theme for law firms (Gutenberg + ACF layouts) with a static
demo mirror and a publishing SOP. Built as a portfolio project for a
WordPress Content Publishing Specialist / Junior Front-End role.

**Firm:** Varela & Ledesma, a fictional Montevideo estudio jurídico. All
content is sample content written for the demo — no real client data.

## Problem

Law-firm marketing agencies publish high volumes of legal content. They need:

1. A theme where editors ship consistent, on-brand articles (Gutenberg + ACF,
   not page-builder soup).
2. Every piece SEO-complete: meta, OG, alt text, headings, schema.
3. A repeatable QA + publishing workflow that survives 100 pieces/month.

This repo delivers all three: the theme, the checklist/SOP, and a static
mirror that proves the front end.

## Repo map

```
lawfirm-publisher/     Custom WP theme (no build, no CDN, self-hosted fonts)
  style.css            Theme header
  front-page.php       Hero + practice index + manifesto + latest posts
  single.php           ACF hero + sticky auto-TOC + author box + post nav
  index.php page.php header.php footer.php functions.php
  template-parts/      hero-article, content-teaser, content-none
  acf-json/            Article hero field group (kicker, hero image, toc toggle)
  assets/              css + js + fonts (woff2) + img (svg/png)
  screenshot.png       1200×900 theme preview (captured from the demo)
demo-static/           3-page static mirror, deployable as-is to Netlify
  index.html article.html contact.html + assets/ + DESIGN.md
docs/                  SEO-CHECKLIST.md, PUBLISHING-SOP.md
scripts/               validate.sh, inline_fonts.py, check_headings.py, make_images.py
screenshots/           Desktop 1440 + mobile 390 QA captures
```

## Theme install + ACF import

1. Zip `lawfirm-publisher/` and upload via **Appearance → Themes → Add New**,
   or copy the dir into `wp-content/themes/` and activate.
2. Install **Advanced Custom Fields** (free). The field group loads
   automatically from `acf-json/article-hero.json` (version-controlled sync).
   No ACF? The theme degrades gracefully (category kicker, featured image, TOC on).
3. Menus: assign **Primary**, **Footer: practice areas**, **Footer: studio**.
4. Customizer → Colors → **Accent color** tunes the brass to the brand.
5. Create a Contact page (slug `contacto`) and set the front page to static.

## Static demo

```bash
./demo.sh            # serves demo-static/ on http://localhost:8020
./scripts/validate.sh  # structural + alt + headings + ban-list, exits 0
```

Deploy: point Netlify at `demo-static/` (no build command, publish dir `.`).

Fonts are self-hosted woff2, base64-inlined into `assets/css/site.css` by
`scripts/inline_fonts.py` (edit `site.src.css`, rebuild, commit both).

## Screenshots

| Page | Desktop 1440 | Mobile 390 |
|---|---|---|
| Home | `screenshots/index-1440.png` | `screenshots/index-390.png` |
| Article | `screenshots/article-1440.png` | `screenshots/article-390.png` |
| Contact | `screenshots/contact-1440.png` | `screenshots/contact-390.png` |

## Publishing workflow

- Per-piece gate: `docs/SEO-CHECKLIST.md`
- 100/month ops: `docs/PUBLISHING-SOP.md` (intake → format → SEO → QA → ship → log)
