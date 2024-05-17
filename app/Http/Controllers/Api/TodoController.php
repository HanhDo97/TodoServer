<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use App\Models\Task;
use App\Models\Todo;
use App\Services\TodoService;
use Exception;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::with('tasks')->get();
        return $this->successResponse($todos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request)
    {
        try {
            // Assuming you have a validation function or use a framework's validation method
            $todo = TodoService::create($request->all());

            if ($todo) {
                return $this->successResponse($todo);
            } else {
                return $this->errorResponse('Creation failed');
            }
        } catch (Exception $e) {
            return $this->errorResponse('An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Assuming you have a validation function or use a framework's validation method
            $bool = TodoService::update($request->all(), $id);

            if ($bool) {
                return $this->successResponse('Updated successfully');
            } else {
                return $this->errorResponse('Updatation failed');
            }
        } catch (Exception $e) {
            return $this->errorResponse('An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
