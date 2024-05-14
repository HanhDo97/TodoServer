<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getInfor(Request $request)
    {
        $user  = $request->user();

        return $this->successResponse(
            new UserResource($user)
        );
    }
}
