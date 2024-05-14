<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'todo_id' => 1,
            'title' => 'Project Planning'
        ]);
        Task::create([
            'todo_id' => 1,
            'title' => 'Sprint Planning'
        ]);
        Task::create([
            'todo_id' => 1,
            'title' => 'Meeting Planning'
        ]);
        Task::create([
            'todo_id' => 1,
            'title' => 'Deploy Planning'
        ]);
    }
}
