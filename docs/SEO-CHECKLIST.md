# SEO checklist — every post, every page

Run this checklist before pressing Publish. One miss = back to Draft.

## Meta & indexation

- [ ] Title tag ≤ 60 chars, keyword near the front, firm name at the end
- [ ] Meta description 140–160 chars, one verb, one proof point, no clickbait
- [ ] Canonical URL set (self-canonical on originals)
- [ ] `noindex` on tags, author archives, search results, paginated page 2+
- [ ] One H1 per URL; H2s in logical order (run `scripts/check_headings.py` on static)

## Content

- [ ] Standfirst/excerpt answers the query in ≤ 40 words (featured-snippet slot)
- [ ] TOC present on posts with 4+ sections (`toc_toggle` ON in ACF)
- [ ] Citations card: every statute, decree and figure traced to a source
- [ ] Internal links: ≥ 2 to practice pages, ≥ 1 to a related post
- [ ] External links: official sources only (.gub.uy, Poder Judicial), open in new tab
- [ ] Disclaimer line on legal content ("informativo, no asesoramiento")

## Images & media

- [ ] Every `<img>` has a descriptive `alt` (grep-verified, never "image of")
- [ ] Hero ≥ 1200 px wide, compressed (target < 200 KB), `fetchpriority="high"` on LCP
- [ ] File names slugified: `constituir-sas-uruguay-hero.svg`, no `IMG_2049`
- [ ] OG image 1200×630 present and reachable (WhatsApp preview test)

## Structured data

- [ ] Article JSON-LD: headline, datePublished, author, publisher
- [ ] Attorney/LocalBusiness JSON-LD on home + contact (NAP identical everywhere)
- [ ] Validate once per template change: Google Rich Results Test

## QA (desktop + mobile)

- [ ] Desktop 1440 + mobile 390 screenshots attached to the ship log
- [ ] Zero console errors; zero 404s in the request log
- [ ] No horizontal overflow at 390 px (`innerWidth === scrollWidth`)
- [ ] Sticky elements (header, TOC) never cover content or CTAs
- [ ] Form validates: required fields block submit, errors announced, focus moves
- [ ] Contrast ≥ 4.5 on every text pair (brass has per-surface variants — check both)

## Pre-publish commands

```bash
./scripts/validate.sh        # structural + alt + headings, must exit 0
./demo.sh &                  # serve :8020, verify in a live browser
```
