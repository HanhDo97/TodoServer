<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivilegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('privileges')->insert([
            'name'   => 'Highest Access Privilege',
            'code'   => 'ROOT',
            'created_at' => now(),
        ]);
        DB::table('privileges')->insert([
            'name'   => 'High Access Privilege',
            'code'   => 'ADMIN',
            'created_at' => now(),
        ]);
        DB::table('privileges')->insert([
            'name'   => 'Medium Access Privilege',
            'code'   => 'USER',
            'created_at' => now(),
        ]);
        DB::table('privileges')->insert([
            'name'   => 'Low Access Privilege',
            'code'   => 'GUEST',
            'created_at' => now(),
        ]);
    }
}
