<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('role')->delete();

        DB::table('role')->insert([
            ['role_id' => 1, 'role_name' => 'user'],
            ['role_id' => 2, 'role_name' => 'jurnalis'],
            ['role_id' => 3, 'role_name' => 'admin'],
        ]);
    }
}
