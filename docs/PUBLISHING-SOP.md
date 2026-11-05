# Publishing SOP — 100 pieces/month workflow

How one publisher ships ~5 pieces per working day without quality drift.
Roles: **Publisher** (owns the checklist + ship log) and **Reviewer** (lawyer sign-off).

## Pipeline stages

```
INTAKE → FORMAT → SEO → QA → SHIP → LOG
 15m      45m     20m   20m   5m    5m   ≈ 110 min/piece
```

Five pieces/day = ~9 h with batching (intake and QA batched in blocks of 5).

## 1. Intake (batch: 5 briefs, morning block)

1. Pull the 5 briefs from the content calendar (title, keyword, practice area, SME).
2. Verify sources exist: statute number, official link, or SME quote. No source = brief rejected, back to the strategist the same day.
3. Create 5 Drafts in WP with slug, category and ACF kicker prefilled. Status: `draft`.

## 2. Format (one piece at a time)

1. Paste copy into Gutenberg; strip foreign formatting (paste-as-text, re-apply).
2. Structure: H1 (title) → standfirst → H2 sections → citations card → author box.
3. Kicker (ACF): practice area only. Hero image (ACF): upload, slugified filename, **alt required**.
4. `toc_toggle`: ON if 4+ H2s, OFF otherwise.
5. Excerpt: ≤ 40 words, answers the query.

## 3. SEO (per piece, with the checklist)

1. Run `docs/SEO-CHECKLIST.md` top to bottom. Check every box or revert to Draft.
2. Internal links: 2 to practice pages + 1 related post. External: official sources only.
3. OG image check: open the WhatsApp preview (or `og:image` URL) before ship.

## 4. QA desktop + mobile (batch: 5 URLs, afternoon block)

1. Open each URL live at 1440 and 390 (DevTools device toolbar or agent-browser).
2. Per URL: screenshot both widths; console clean; no 404s; no 390 overflow.
3. Sticky check: scroll top→bottom, header/TOC never cover text or the CTA.
4. Form pages: submit empty (must block), submit valid (must pass).

## 5. Ship

1. Reviewer sign-off on legal accuracy (async comment or 15-min daily slot).
2. Publish / schedule. Verify the live URL returns 200 and the correct `<title>`.
3. Submit new URLs to Search Console (sitemap ping covers it if automated).

## 6. Ship log (append-only, 5 min)

One line per piece in `docs/ship-log.csv`:

```csv
date,slug,reviewer,qa_desktop,qa_mobile,notes
2026-11-06,constituir-sas-uruguay,MLedesma,ok,ok,toc on; og ok
```

## Guardrails

- No piece ships without a reviewer initial and a QA screenshot pair.
- Three checklist misses in a week = pause and fix the template, not the publisher.
- The static mirror (`demo-static/`) is rebuilt from the theme after any design change; `validate.sh` must exit 0 before deploy.
