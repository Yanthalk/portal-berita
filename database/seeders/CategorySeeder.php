<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('category')->insert([
            [
                'category_id' => 1,
                'nama_kategori' => 'Politik',
            ],
            [
                'category_id' => 2,
                'nama_kategori' => 'Teknologi',
            ],
            [
                'category_id' => 3,
                'nama_kategori' => 'Kesehatan',
            ],
        ]);
    }
}
