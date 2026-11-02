#!/usr/bin/env python3
"""Inline self-hosted woff2 fonts into the demo CSS (single-file, offline-safe).

Reads demo-static/assets/css/site.src.css, replaces the /*__FONT_FACE__*/ token
with @font-face rules (base64 data URIs from demo-static/assets/fonts/*.woff2),
writes demo-static/assets/css/site.css. Run after editing site.src.css:

    python3 scripts/inline_fonts.py
"""
import base64
from pathlib import Path

ROOT = Path(__file__).resolve().parent.parent
FONTS = [
    ("Fraunces", "600", "normal", "Fraunces-600.woff2"),
    ("Fraunces", "600", "italic", "Fraunces-i600.woff2"),
    ("PublicSans", "400", "normal", "PublicSans-400.woff2"),
    ("PublicSans", "600", "normal", "PublicSans-600.woff2"),
    ("JetBrainsMono", "400", "normal", "JetBrainsMono-400.woff2"),
]
TOKEN = "/*__FONT_FACE__*/"
SRC = ROOT / "demo-static" / "assets" / "css" / "site.src.css"
OUT = ROOT / "demo-static" / "assets" / "css" / "site.css"
FONTDIR = ROOT / "demo-static" / "assets" / "fonts"


def main() -> None:
    rules = []
    for family, weight, style, fname in FONTS:
        data = (FONTDIR / fname).read_bytes()
        b64 = base64.b64encode(data).decode()
        rules.append(
            f"@font-face{{font-family:'{family}';font-weight:{weight};"
            f"font-style:{style};font-display:swap;src:url(data:font/woff2;base64,{b64}) format('woff2');}}"
        )
    src = SRC.read_text()
    assert TOKEN in src, "font token missing in site.src.css"
    OUT.write_text(src.replace(TOKEN, "\n".join(rules)))
    print(f"wrote site.css ({OUT.stat().st_size // 1024} KB)")


if __name__ == "__main__":
    main()
