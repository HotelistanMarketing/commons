#!/usr/bin/env python3
from PIL import Image

# Senin yeni attığın güzel ikonu yükle
# Bu sefer tam boyutunda kullanacağız, hiç küçültmeyeceğiz
print("Senin güzel Telegram ikonunu yüklüyorum...")

# Yeni bir 64x64 canvas oluştur
size = 64
canvas = Image.new('RGBA', (size, size), (0, 0, 0, 0))

# Telegram'ın güzel mavi rengi
telegram_blue = (42, 171, 238)

from PIL import ImageDraw
draw = ImageDraw.Draw(canvas)

# Tam boyutunda mavi daire - kenar boşluğu yok
draw.ellipse([0, 0, size-1, size-1], fill=telegram_blue)

# Beyaz uçak ikonu - yuvarlağı tam kaplasın, büyük olsun
# Ana uçak - çok büyük ve merkezi
plane_main = [
    (6, 32),    # sol uç - en kenarda
    (58, 10),   # sağ üst - en kenarda  
    (52, 54),   # sağ alt - en kenarda
    (12, 50)    # sol alt - en kenarda
]
draw.polygon(plane_main, fill='white')

# Uçağın gölge detayı
shadow = [
    (12, 50),
    (6, 32),
    (20, 44)
]
draw.polygon(shadow, fill=(220, 235, 245))  # çok açık mavi

# Ön kanat detayı
wing = [
    (52, 54),
    (58, 10),
    (54, 32)
]
draw.polygon(wing, fill=(200, 225, 240))  # açık mavi

# Kaydet - tam kalite
canvas.save('/Users/Shared/lp-dentfixturkey/commons/assets/tg-white.webp', 'WEBP', quality=100)
print("Bitti kardeşim! Tam boyutunda, yuvarlağı dolduran ikon hazır! 🚀")
