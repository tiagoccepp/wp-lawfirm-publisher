# DESIGN.md — Varela & Ledesma · Estudio Jurídico (portfolio demo)

Fictional Montevideo law firm. Audience: general counsel + business owners hiring counsel.
ONE primary action per screen: **agendar consulta** (contact page / tel link).

## Palette (verified WCAG, script 2026-11-06)

| Token | Hex | Role | Contrast |
|---|---|---|---|
| `--ink` | #17211E | body text on paper | 14.77 on paper |
| `--paper` | #F6F2E9 | dominant surface | — |
| `--paper-dim` | #EFE8D8 | alt bands, cards | 13.52 ink |
| `--pine` | #22332E | dark surface (footer, hero band) | 11.89 paper |
| `--pine-deep` | #131C1A | preloader, deepest | 15.55 paper |
| `--accent` | #6E531A | brass, on-paper only (eyebrows, rules, links) | 6.45 |
| `--brass` | #D9B36A | brass-light, on-dark only | 6.71 on pine |
| `--muted` | #57615B | secondary text on paper | 5.75 |
| `--muted-dk` | #B9C0B4 | secondary text on dark | 7.12 |
| `--line` | #D9D1BC | hairlines on paper | decorative |

Dominant: paper. ONE sharp accent: brass (with per-surface variants — the 2026-10-16 trap).
No gradients, no indigo, no cream+terracotta cluster. Brass ≤2 visible uses per screen.

## Type roles

- `--font-display`: Fraunces 600 (+ italic 600 for the single accent word) — headlines, pull quotes
- `--font-body`: PublicSans 400/600 — body, UI
- `--font-label`: JetBrainsMono 400 — eyebrows, meta, TOC numbers, captions
- Scale: hero `clamp(3rem,7vw,5.5rem)` Fraunces; h2 `clamp(1.9rem,3.6vw,2.75rem)`;
  body 1.0625rem/1.7, max 68ch (article 66ch); label .75rem/1.4 mono, letter-spacing .12em, NOT all-caps everywhere (caps only for eyebrows with real info: section indices, dates)
- All fonts self-hosted woff2, base64 `@font-face` in demo CSS, file `@font-face` in WP theme. Zero CDN.

## Layout concept

Editorial broadsheet: hairline rules, numbered sections (`§ 01 — Áreas`), marginalia meta
columns, oversized serif headlines, quiet disciplined body. ASCII hero:

```
+--------------------------------------------------------------+
| V&L monogram   Áreas  Publicaciones  El estudio  Contacto [CTA]|
|--------------------------------------------------------------|
| § Estudio jurídico — Montevideo, desde 1998                   |
|  DEFENDEMOS        |  meta col:                        | [emblem|
|  lo que su         |  27 años · 4 áreas ·              |  svg   |
|  empresa *vale*.   |  respuesta < 24 h                 |  line  |
| [Agendar consulta] [Ver áreas de práctica]                    |
+--------------------------------------------------------------+
```

ONE unconventional section: **"El código de la casa"** — five numbered house rules as an
editorial manifesto list (no cards), each with a one-line gloss. Second signature moment:
article page with sticky TOC rail + "Fuentes y normativa" citations card.
Footer: full NAP + practice index + colophon. No map embed (map-free "dónde estamos" card
on contact: address, transit lines, landmark — honest static content).

## Motion vocabulary (≤6)

1. Preloader: pine-deep veil + monogram draw, ≤1.2s, then hero assembly.
2. Hero assembly: headline lines rise (translateY+opacity, staggered), meta col fades.
3. Reveals: IntersectionObserver ~.12, sections rise once; TOC rail pins via position sticky (no JS).
4. Hovers: color/background transitions ≥.5s ease; links get brass underline sweep.
5. Scrollspy: TOC current-section highlight (IntersectionObserver on h2s).
6. `prefers-reduced-motion`: everything static, content fully visible.

Banned: cursor glows, custom cursors, tilt, marquees.

## Principles (what makes THIS page different)

1. Broadsheet gravity: rules, section numbers and marginalia instead of SaaS cards.
2. Restraint as luxury: one accent, two surfaces, silence between sections.
3. Content is the proof: full-length article with TOC + cited statutes, not lorem.
4. Formal usted voice, rioplatense legal Spanish, zero invented verdicts/metrics.
5. Every page shippable as print-clean HTML: semantic landmarks, one h1, alt on all img.

## Self-check vs ban-list (genericity pass)

First draft risked: 4 identical practice-area cards + "por qué elegirnos" + hero gradient.
Changed: practices became a ruled editorial index with numbers and outcome glosses;
"why us" became the manifesto list; hero is flat paper with a line-art emblem.
Eyebrows encode real info (§ numbers, dates, reading time) — never decorative caps.
No middot meta strings, no `→` on every CTA (one text CTA max per screen), no emoji icons,
no 01/02/03 where content is not a sequence (manifesto IS a sequence — allowed).
