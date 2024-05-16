<?php

namespace App\Services;

use App\Models\Project;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ProjectService
{
    public static function create($data): null | Project
    {
        try {
            // Create the task item using the provided data
            $task = Project::create($data);

            if (!$task) return null;
        } catch (QueryException $e) {
            $task->delete();
            throw new Exception('The is a problem with sql query or might be lost connect to the database' . $e->getMessage());
        } catch (Exception $e) {
            $task->delete();
            throw new Exception($e->getMessage());
        }

        return $task;
    }

    public static function update($data, $id): bool
    {
        DB::beginTransaction();
        try {
            $task = Project::findOrFail($id);
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
