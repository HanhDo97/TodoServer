<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title'         => 'Important Project',
            'id_user_owner' => 2
        ]);
        Project::create([
            'title'         => 'Development Project',
            'id_user_owner' => 2
        ]);
        DB::table('project_user')->insert([
            'project_id' => 1,
            'user_id'    => 2,
        ]);
        DB::table('project_user')->insert([
            'project_id' => 1,
            'user_id'    => 1,
        ]);
        DB::table('project_user')->insert([
            'project_id' => 2,
            'user_id'    => 2,
        ]);
    }
}
