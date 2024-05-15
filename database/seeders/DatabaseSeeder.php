<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name'         => 'Admin',
            'privilege_id' => 1,
            'email'        => 'admin@mail.com',
            'password'     => Hash::make('passWord'),
        ]);

        User::factory()->create([
            'name'         => 'Limited Permissions User',
            'privilege_id' => 2,
            'email'        => 'user@mail.com',
            'password'     => Hash::make('test321'),
        ]);

        $this->call([
            TodoSeeder::class,
            TaskSeeder::class,
            PrivilegeSeeder::class,
        ]);
    }
}
