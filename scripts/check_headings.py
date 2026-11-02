#!/usr/bin/env python3
"""Check heading order per file: exactly one h1, no skipped levels (h1->h3 etc)."""
import re
import sys
from pathlib import Path

fails = 0
for path in sorted((Path(__file__).resolve().parent.parent / "demo-static").glob("*.html")):
    html = path.read_text()
    levels = [int(m.group(1)) for m in re.finditer(r"<h([1-6])[\s>]", html)]
    errs = []
    if levels.count(1) != 1:
        errs.append(f"h1 count = {levels.count(1)} (want 1)")
    for a, b in zip(levels, levels[1:]):
        if b > a + 1:
            errs.append(f"level skip h{a} -> h{b}")
    if errs:
        fails += 1
        print(f"FAIL {path.name}: {'; '.join(errs)}")
    else:
        print(f"OK {path.name}: {len(levels)} headings, order clean")
sys.exit(1 if fails else 0)
