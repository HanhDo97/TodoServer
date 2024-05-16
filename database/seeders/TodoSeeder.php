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
            'title'      => 'Planning',
            'project_id' => 1,
            'order'      => 1,
        ]);
        Todo::create([
            'title'      => 'Deploying',
            'project_id' => 1,
            'order'      => 2
        ]);
    }
}
