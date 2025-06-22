<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateGambarBeritaSeeder extends Seeder
{
    public function run()
    {
        $gambarList = ['berita/berita1.jpg', 'berita/berita2.jpg'];

        $beritas = DB::table('berita')->whereNull('gambar')->get();

        foreach ($beritas as $index => $berita) {
            $gambar = $gambarList[$index % count($gambarList)];

            DB::table('berita')
                ->where('news_id', $berita->news_id)
                ->update(['gambar' => $gambar]);
        }
    }
}
