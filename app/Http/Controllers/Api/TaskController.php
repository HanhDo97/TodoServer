<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Services\TaskService;
use Exception;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $task = Task::all();
        return $this->successResponse($task);
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
    public function store(Request $request)
    {
        try {
            // Assuming you have a validation function or use a framework's validation method
            $task = TaskService::create($request->all());

            if ($task) {
                return $this->successResponse(
                    $task
                );
            } else {
                return $this->errorResponse('Creation failed');
            }
        } catch (Exception $e) {
            return $this->errorResponse('An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Assuming you have a validation function or use a framework's validation method
            $bool = TaskService::update($request->all(), $id);

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
