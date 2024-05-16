<?php

namespace App\Services;

use App\Models\Todo;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class TodoService
{
    public static function create($data, $user): bool
    {
        try {
            // Create the todo item using the provided data
            $todo = Todo::create($data);
        } catch (QueryException $e) {
            $todo->delete();
            throw new Exception('The is a problem with sql query or may be lost connect to the database' . $e->getMessage());
        } catch (Exception $e) {
            $todo->delete();
            throw new Exception($e->getMessage());
        }

        return true;
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
