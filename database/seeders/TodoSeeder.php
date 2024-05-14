<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Todo::create([
            'title' => 'Planning'
        ]);
        Todo::create([
            'title' => 'Deploying'
        ]);

        DB::table('todo_user')->insert([
            'todo_id'   => 1,
            'user_id'   => 1,
        ]);
        DB::table('todo_user')->insert([
            'todo_id'   => 2,
            'user_id'   => 1,
        ]);
    }
}
