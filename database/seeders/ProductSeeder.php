<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'nama' => 'Hoodie Sweater "TYE DIE PINK"',
                'kategori' => 'Hoodie',
                'detail' => '<p>Menggunakan <strong>material Cotton Fleece pilihan terbaik</strong>, menghadirkan sentuhan lembut dan kehangatan ekstra. Dipadukan dengan desain <strong>Tye Die Pink</strong> yang kekinian, cocok buat kamu yang ingin tampil beda dengan gaya <i>classy </i>tapi tetap santai.</p>',
                'harga' => 110000,
                'gambar' => 'produk/btNT1c6I2aP8j8QK7StnPVG3jBl0fYpdOmMZq2wl.jpg',
                'stok_s' => 10,
                'stok_m' => 15,
                'stok_l' => 12,
                'stok_xl' => 0,
            ],
            [
                'nama' => 'Hoodie Sweater "BYNDR 1998"',
                'kategori' => 'Hoodie',
                'detail' => '<p>Menggunakan <strong>material Cotton Fleece high quality</strong> yang lembut dan hangat, memberikan kenyamanan maksimal di setiap aktivitas. Dibalut dengan desain <strong>BYNDR 1998</strong> yang simple namun berkarakter, menciptakan tampilan casual premium yang siap mendukung gaya harianmu dengan effortless style.</p>',
                'harga' => 140000,
                'gambar' => 'produk/xdorJz9gSSfw4jIYqvRxPgGAPjZOwheV74TBlv7D.jpg',
                'stok_s' => 9,
                'stok_m' => 14,
                'stok_l' => 10,
                'stok_xl' => 0,
            ],
            [
                'nama' => 'Hoodie Sweater "CRSH MENTUM"',
                'kategori' => 'Hoodie',
                'detail' => '<p><strong>Hoodie Sweater “CRSH MENTUM”</strong> menggunakan <strong>material Cotton Fleece high quality</strong> yang lembut, hangat, dan nyaman dipakai seharian. Desainnya simpel tapi tetap standout, menciptakan kesan <strong>casual premium</strong> dengan sentuhan gaya <strong>streetwear modern</strong> yang cocok buat segala suasana — dari nongkrong santai sampai aktivitas harian.</p>',
                'harga' => 120000,
                'gambar' => 'produk/EQQesrCHE23ZB1F5GxpS45M2RBKq82FGSp6v9hxE.jpg',
                'stok_s' => 11,
                'stok_m' => 13,
                'stok_l' => 10,
                'stok_xl' => 7,
            ],
            [
                'nama' => 'Hoodie Sweater "JAQYUU OLD SCHOOL"',
                'kategori' => 'Hoodie',
                'detail' => '<p><strong>Hoodie Sweater “JAQYUU OLD SCHOOL”</strong> dibuat dari <strong>material Cotton Fleece high quality</strong> yang lembut, tebal, dan super nyaman dipakai. Desain klasik dengan sentuhan <strong>old school vibe</strong> menghadirkan look yang <i>timeless </i>namun tetap <i>stylish</i>. Cocok buat kamu yang suka tampil santai tapi tetap berkarakter di setiap momen.</p>',
                'harga' => 120000,
                'gambar' => 'produk/30NgJdnmF2dCiVVHcKxGkqU6xsU05m3tFvV9jCa6.jpg',
                'stok_s' => 12,
                'stok_m' => 10,
                'stok_l' => 9,
                'stok_xl' => 5,
            ],
            [
                'nama' => 'Hoodie Sweater "METELICA DETAIL"',
                'kategori' => 'Hoodie',
                'detail' => '<p><strong>Hoodie Sweater “METELICA DETAIL”</strong> terbuat dari <strong>material Cotton Fleece high quality</strong> yang lembut, hangat, dan nyaman dipakai sepanjang hari. Desainnya khas dengan <strong>detail unik bergaya streetwear</strong> yang bikin tampilan kamu makin standout. Cocok buat kamu yang ingin tampil keren tanpa kehilangan sisi casual-nya.</p>',
                'harga' => 140000,
                'gambar' => 'produk/trWqF5kEUL6runPfuMkREcm7bnWpLc4qf4VrErf5.jpg',
                'stok_s' => 18,
                'stok_m' => 11,
                'stok_l' => 0,
                'stok_xl' => 0,
            ],
            [
                'nama' => 'Hoodie Sweater "SHERPA"',
                'kategori' => 'Hoodie',
                'detail' => '<p><strong>Hoodie Sweater “SHERPA”</strong> &nbsp;terbuat dari <strong>material Cotton Fleece high quality</strong> yang lembut dan tebal, memberikan rasa hangat serta nyaman saat dipakai. Desainnya simple tapi tetap <i>stylish</i>, cocok untuk kamu yang ingin tampil keren dan <i>cozy </i>di segala suasana.</p>',
                'harga' => 140000,
                'gambar' => 'produk/YTdEOSg1VBpP6w0Z6s4U9vjysWuRuBlEbnjF5rAa.jpg',
                'stok_s' => 10,
                'stok_m' => 10,
                'stok_l' => 8,
                'stok_xl' => 5,
            ],
            [
                'nama' => 'Hoodie Sweater "STRIPE PANATEAH"',
                'kategori' => 'Hoodie',
                'detail' => '<p><strong>Hoodie Sweater “STRIPE PANATEAH”</strong> yang dibuat dari <strong>material Cotton Fleece high quality</strong> yang lembut, adem, dan tebal. Memberikan kenyamanan maksimal dengan desain garis khas yang bikin tampilan kamu makin <i>stylish </i>dan standout di setiap momen.</p>',
                'harga' => 140000,
                'gambar' => 'produk/q5O0Xux1DueBlHrXIjlArvGNth1u3iGd1Z7SWnUP.jpg',
                'stok_s' => 13,
                'stok_m' => 12,
                'stok_l' => 9,
                'stok_xl' => 0,
            ],
            [
                'nama' => 'Hoodie Sweater "EINSTEN"',
                'kategori' => 'Hoodie',
                'detail' => '<p><strong>Hoodie Sweater “EINSTEN”</strong> &nbsp;yang terbuat dari <strong>material Cotton Fleece high quality</strong> yang lembut dan hangat, memberikan kenyamanan maksimal dengan desain <i>kasual </i>modern yang bikin penampilan kamu tetap keren dan berkelas di setiap kesempatan.</p>',
                'harga' => 140000,
                'gambar' => 'produk/yr99gDhcLKVELRgkjw6XjsK2x4u4IiKwRkFydq7n.jpg',
                'stok_s' => 9,
                'stok_m' => 11,
                'stok_l' => 8,
                'stok_xl' => 0,
            ],
            [
                'nama' => 'Hoodie Sweater "WHOA"',
                'kategori' => 'Hoodie',
                'detail' => '<p><strong>Hoodie Sweater “WHOA”</strong> dibuat dari <strong>material Cotton Fleece high quality</strong> yang super lembut dan nyaman dipakai. Desainnya simple tapi tetap <i>stylish</i>, cocok buat kamu yang pengen tampil santai tapi tetap keren setiap hari.</p>',
                'harga' => 140000,
                'gambar' => 'produk/Oh4HR7KF3BfAmrdm1tBDLYZFlMy7sS64rfa6RRNs.jpg',
                'stok_s' => 0,
                'stok_m' => 12,
                'stok_l' => 11,
                'stok_xl' => 0,
            ],
            [
                'nama' => 'TSHIRT oversize sideline SERIES "JAQYUU VINTAGE"',
                'kategori' => 'Tshirt',
                'detail' => '<p><strong>T-Shirt Oversize Sideline Series “JAQYUU VINTAGE”</strong> Hadir dengan <strong>gaya retro yang timeless</strong> dan potongan <strong>oversize kekinian</strong> yang nyaman dipakai seharian. Terbuat dari <strong>material premium cotton</strong> yang adem dan lembut di kulit — cocok buat kamu yang suka tampil santai tapi tetap standout.</p>',
                'harga' => 80000,
                'gambar' => 'produk/I0RQgOd6Y8kdCGCf1WFEwmTzYFxVAiJ6rPJia5Jh.jpg',
                'stok_s' => 15,
                'stok_m' => 15,
                'stok_l' => 15,
                'stok_xl' => 0,
            ],
        ]);
    }
}
