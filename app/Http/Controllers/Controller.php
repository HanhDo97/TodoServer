<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    /**
     * Send a success response.
     *
     * @param array|string $data
     * @param int $statusCode
     * @return JsonResponse
     */
    protected function successResponse($data = [], $statusCode = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data,
        ], $statusCode);
    }

    /**
     * Send an error response.
     *
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    protected function errorResponse($message, $statusCode = 500): JsonResponse
    {
        // Check if app is in debug mode
        if (!config('app.debug')) {
            $message = 'Server error';
        }

        return response()->json([
            'success' => false,
            'error' => $message,
        ], $statusCode);
    }
}
