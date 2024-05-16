<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response; // Import Response class
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function getInfor(Request $request)
    {
        // Retrieve a specific cookie
        $lastProject = $request->cookie('last_project');
        
        $user  = $request->user();

        // Create a response with the UserResource
        $response = new UserResource($user);

        // Attach the cookie to the response
        $cookie = cookie('last_project', $lastProject, 60, '/', null, null, false); 

        return $this->successResponse($response, $cookie);
    }
}
