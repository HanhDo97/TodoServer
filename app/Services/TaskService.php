<?php

namespace App\Services;

use App\Models\Task;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class TaskService
{
    public static function updatePosition($data): bool
    {
        try {
            $taskModel = Task::findOrFail($data['task_id']);
            $taskModel->todo_id = $data['list_id'];
            $taskModel->save();
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    public static function create($data): null | Task
    {
        try {
            // Create the task item using the provided data
            $task = Task::create($data);

            if (!$task) return null;
        } catch (QueryException $e) {
            throw new Exception('The is a problem with sql query or might be lost connect to the database' . $e->getMessage());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return $task;
    }

    public static function update($data, $id): bool
    {
        DB::beginTransaction();
        try {
            $task = Task::findOrFail($id);
            $task->title = $data['title'];
            $task->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
        return true;
    }
}
