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
                'judul' => 'Hoodie Sweater "TYE DIE PINK"',
                'sub_judul' => 'Hoodie',
                'gambar' => 'iklan/S0Nx0lY9J5DSzroUQIhV2jxZ0T5DwwXoew6AHXML.png',
                'product_id' => 101,
            ],
        ]);
    }
}
