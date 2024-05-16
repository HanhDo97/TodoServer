<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TaskService;
use App\Services\TodoService;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function updateTodo(Request $request)
    {
        $bool = TodoService::updatePosition($request->all());

        if ($bool) {
            return $this->successResponse([
                'message' => 'Update successfully'
            ]);
        }

        return $this->errorResponse('Error occurred; Fail to update todos position');
    }
    public function updateTask(Request $request)
    {
        $bool = TaskService::updatePosition($request->all());

        if ($bool) {
            return $this->successResponse([
                'message' => 'Update successfully'
            ]);
        }

        return $this->errorResponse('Error occurred; Fail to update task position');
    }
}
