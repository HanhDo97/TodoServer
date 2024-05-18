<?php

namespace App\Services;

use App\Models\Project;
use App\Models\User;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

class ProjectService
{
    public static function getUsers(int $projectId, User $user)
    {
        $project = Project::findOrFail($projectId)->with('users')->first();

        // Check if the user exists in the project's users
        $isUserExists = $project->users->contains($user->id);

        if (!$isUserExists) throw new AuthorizationException('You do not have permission to access this resource');
        
        return $project;
    }

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
