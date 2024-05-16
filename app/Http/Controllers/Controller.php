<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

abstract class Controller
{
    /**
     * Send a success response.
     *
     * @param array|string $data
     * @param int $statusCode
     * @return JsonResponse
     */
    protected function successResponse($data = [], $cookies = '', $statusCode = 200): Response
    {
        $response = new Response($data, $statusCode);
        if ($cookies !== '')
            $response->withCookie($cookies);

        return $response;
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
