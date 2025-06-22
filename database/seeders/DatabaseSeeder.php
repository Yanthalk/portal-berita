<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menjalankan seeder untuk tabel role
        $this->call([
            BeritaSeeder::class,
            CategorySeeder::class,
            RoleSeeder::class,
            UpdateGambarBeritaSeeder::class,
        ]);
    }
}
