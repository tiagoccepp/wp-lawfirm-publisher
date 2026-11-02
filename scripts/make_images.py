#!/usr/bin/env python3
"""Generate raster social/OG image with PIL (offline, DejaVu system fonts)."""
from pathlib import Path
from PIL import Image, ImageDraw, ImageFont

ROOT = Path(__file__).resolve().parent.parent
IMG = ROOT / "demo-static" / "assets" / "img"

PINE = (34, 51, 46)
PAPER = (246, 242, 233)
BRASS = (217, 179, 106)
MUTED = (185, 192, 180)


def font(name: str, size: int) -> ImageFont.FreeTypeFont:
    return ImageFont.truetype(f"/usr/share/fonts/truetype/dejavu/{name}", size)


def og_image() -> None:
    im = Image.new("RGB", (1200, 630), PINE)
    d = ImageDraw.Draw(im)
    d.rectangle([80, 150, 200, 156], fill=BRASS)
    d.text((80, 190), "Varela & Ledesma", font=font("DejaVuSerif-Bold.ttf", 88), fill=PAPER)
    d.text((80, 310), "Estudio jurídico — Montevideo", font=font("DejaVuSerif.ttf", 44), fill=BRASS)
    d.text(
        (80, 420),
        "Societario · Laboral · Inmobiliario · Litigios",
        font=font("DejaVuSans.ttf", 34),
        fill=MUTED,
    )
    d.text((80, 520), "varelayledesma.uy", font=font("DejaVuSansMono.ttf", 30), fill=MUTED)
    im.save(IMG / "og-image.png")
    print("wrote og-image.png")


if __name__ == "__main__":
    IMG.mkdir(parents=True, exist_ok=True)
    og_image()
