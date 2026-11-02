#!/usr/bin/env bash
# Full validation: PHP lint (or structural fallback) + alt check + headings + ban-list.
# Must exit 0 for a shippable tree.
set -u
ROOT="$(cd "$(dirname "$0")/.." && pwd)"
FAIL=0

echo "== theme structure =="
REQUIRED="style.css index.php single.php page.php front-page.php functions.php header.php footer.php template-parts/hero-article.php template-parts/content-teaser.php template-parts/content-none.php assets/css/main.css assets/js/main.js acf-json/article-hero.json screenshot.png"
for f in $REQUIRED; do
  if [ -f "$ROOT/lawfirm-publisher/$f" ]; then echo "OK $f"; else echo "FAIL missing $f"; FAIL=1; fi
done
grep -q "Theme Name:" "$ROOT/lawfirm-publisher/style.css" && echo "OK theme header" || { echo "FAIL theme header"; FAIL=1; }
python3 -c "import json;json.load(open('$ROOT/lawfirm-publisher/acf-json/article-hero.json'));print('OK acf-json valid')" || FAIL=1

echo "== php =="
if command -v php >/dev/null 2>&1; then
  for f in "$ROOT"/lawfirm-publisher/*.php "$ROOT"/lawfirm-publisher/template-parts/*.php; do
    php -l "$f" >/dev/null || FAIL=1
  done
  echo "php -l done"
else
  echo "(no php; structural checks)"
  python3 - "$ROOT" <<'PY'
import re, sys
root = sys.argv[1]
from pathlib import Path
ok = True
for p in sorted((Path(root) / "lawfirm-publisher").rglob("*.php")):
    t = p.read_text()
    opens = len(re.findall(r"<\?php", t))
    if opens < 1:
        print(f"FAIL {p.name}: no php open tag"); ok = False
    for fn in ["get_header", "get_footer"]:
        pass
    if p.name in ("single.php", "page.php", "front-page.php", "index.php"):
        if "get_header()" not in t or "get_footer()" not in t:
            print(f"FAIL {p.name}: missing header/footer calls"); ok = False
        if t.count("while") < 1 and p.name != "front-page.php":
            print(f"FAIL {p.name}: no loop"); ok = False
print("structural php checks", "OK" if ok else "FAILED")
sys.exit(0 if ok else 1)
PY
  [ $? -ne 0 ] && FAIL=1
fi

echo "== alt attributes =="
if grep -o '<img[^>]*>' "$ROOT"/demo-static/*.html | grep -v 'alt='; then echo "FAIL imgs without alt"; FAIL=1; else echo "OK all img have alt"; fi

echo "== headings =="
python3 "$ROOT/scripts/check_headings.py" || FAIL=1

echo "== ban-list =="
if grep -rniE "googleapis|fonts\.gstatic|placehold\.co|unsplash|#6366f1|#4f46e5|#8b5cf6" "$ROOT"/demo-static/*.html "$ROOT"/demo-static/assets/css/site.src.css "$ROOT"/demo-static/assets/js/ "$ROOT"/lawfirm-publisher --include="*.php" --include="*.css" --include="*.js" | grep -v screenshots; then echo "FAIL ban hits"; FAIL=1; else echo "OK ban-list clean"; fi

echo "== fonts =="
grep -q "@font-face" "$ROOT/demo-static/assets/css/site.css" && echo "OK bundled fonts in site.css" || { echo "FAIL site.css missing fonts (run scripts/inline_fonts.py)"; FAIL=1; }

echo "== node syntax (js) =="
node --check "$ROOT/demo-static/assets/js/site.js" && echo "OK site.js" || FAIL=1

if [ "$FAIL" -eq 0 ]; then echo "VALIDATE: PASS"; else echo "VALIDATE: FAIL"; fi
exit "$FAIL"
