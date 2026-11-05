# Submission — WordPress Content Publishing Specialist

**Tiago Colo** · github.com/tiagoccepp · wp-lawfirm-publisher

## What I built

A complete law-firm publishing kit for a fictional Montevideo firm:

- **Custom WP theme** (`lawfirm-publisher/`): Gutenberg-ready, ACF article-hero
  group (kicker / hero image / TOC toggle), customizer accent, menus,
  thumbnails, excerpts, reading time, auto-TOC from H2s. No build, no CDN.
- **Static demo** (`demo-static/`): 3 pages mirroring the theme — home, full
  article with sticky TOC + citations card, contact with validated form.
- **Ops docs**: per-piece SEO checklist + a 100-pieces/month publishing SOP
  with ship log.

## How it maps to the role

| Requirement | Evidence |
|---|---|
| WP / ACF / custom templates | Theme + `acf-json/article-hero.json`, `single.php` ACF hero |
| Elementor / Gutenberg | Gutenberg-first markup; every block is a core block (no lock-in) |
| HTML / CSS / JS | Hand-written, no framework; `node --check` clean |
| On-page SEO | Meta/OG/canonical, Article + Attorney JSON-LD, SEO checklist |
| Image alt | Every `img` has descriptive alt (grep-verified in CI script) |
| Desktop + mobile QA | 1440 + 390 captures, zero console errors, no 390 overflow |

## Verify in 2 minutes

```bash
git clone https://github.com/tiagoccepp/wp-lawfirm-publisher && cd wp-lawfirm-publisher
./scripts/validate.sh   # exits 0: structure + php + alt + headings + ban-list
./demo.sh               # http://localhost:8020
```

Screenshots: `screenshots/` (desktop + mobile per page). Theme preview:
`lawfirm-publisher/screenshot.png` (1200×900, captured from the live demo).
