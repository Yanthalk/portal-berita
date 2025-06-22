<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Category;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = Category::all();

        foreach ($kategori as $kategoriItem) {
            for ($i = 1; $i <= 5; $i++) {
                DB::table('berita')->insert([
                    'judul'           => "Contoh Berita {$kategoriItem->nama_kategori} #{$i}",
                    'konten'          => "Ini deskripsi singkat untuk berita {$kategoriItem->nama_kategori} ke-{$i}.",
                    'isi'             => "Konten lengkap untuk berita {$kategoriItem->nama_kategori} ke-{$i}.",
                    'gambar'          => null, // atau isi dengan 'images/berita.jpg' jika sudah ada
                    'penulis'         => 'Admin',
                    'tanggal_publish' => Carbon::now()->subMinutes($i * 1),
                    'user_id'         => 3,
                    'category_id'     => $kategoriItem->category_id,
                ]);
            }
        }
    }
}
