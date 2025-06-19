<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClearBeritaSeeder extends Seeder
{
    public function run(): void
    {
        // Nonaktifkan foreign key constraint agar bisa truncate
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Kosongkan isi tabel berita
        DB::table('berita')->truncate();

        // Aktifkan kembali foreign key constraint
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        echo "Tabel berita berhasil dikosongkan.\n";
    }
}
