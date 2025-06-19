<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Politik',
            'Teknologi',
            'Kesehatan',
            'Berita Utama',
            'Bisnis',
            'Kriminal',
            'Pendidikan',
            'Hiburan',
            'Makanan',
            'Olahraga'
        ];

        foreach ($categories as $category) {
            DB::table('category')->updateOrInsert(
                ['nama_kategori' => $category], // kondisi pencocokan
                ['nama_kategori' => $category]  // nilai yang akan di-set/update
            );
        }
    }
}
