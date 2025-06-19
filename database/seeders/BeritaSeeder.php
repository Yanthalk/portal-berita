<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dummyData = [
            [
                'judul' => 'Berita Politik Terbaru',
                'konten' => 'Isi konten tentang berita politik...',
                'tanggal_publish' => Carbon::now(),
                'status_berita' => 'aktif',
                'user_id' => 3,
                'category_id' => 1,
            ],
            [
                'judul' => 'Berita Teknologi Masa Kini',
                'konten' => 'Isi konten tentang teknologi terkini...',
                'tanggal_publish' => Carbon::now()->subDays(1),
                'status_berita' => 'aktif',
                'user_id' => 3,
                'category_id' => 2,
            ],
            [
                'judul' => 'Berita Kesehatan Terkini',
                'konten' => 'Tips kesehatan dan info terbaru...',
                'tanggal_publish' => Carbon::now()->subDays(2),
                'status_berita' => 'nonaktif',
                'user_id' => 3,
                'category_id' => 3,
            ],
        ];

        DB::table('berita')->insert($dummyData);
    }
}
