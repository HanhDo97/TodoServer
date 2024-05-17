<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Todo;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class TodoService
{
    public static function updatePosition($data)
    {
        try {
            $projectId = $data['project_id'];
            $todos = collect($data['todos']);
            
            // Retrieve the project with todos eager loaded
            $project = Project::with('todos')->findOrFail($projectId);

            // Map todos by their id for easier retrieval
            $todosById = $todos->keyBy('id');

            // Iterate over project todos and update their positions if needed
            $project->todos->each(function ($todo) use ($todosById) {
                if ($newTodo = $todosById->get($todo->id)) {
                    if ($todo->order !== $newTodo['order']) {
                        $todo->order = $newTodo['order'];
                        $todo->save();
                    }
                }
            });

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function create($data): bool | Todo
    {
        try {
            // Create the todo item using the provided data
            $todo = Todo::create($data);
        } catch (QueryException $e) {
            throw new Exception('This is a problem with sql query or may be lost connect to the database' . $e->getMessage());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return $todo;
    }

    public static function update($data, $id): bool
    {
        DB::beginTransaction();
        try {
            $todo = Todo::findOrFail($id);
            $todo->title = $data['title'];
            $todo->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
        return true;
    }
}
