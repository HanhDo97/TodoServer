<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getInfor(Request $request){
        $user  = $request->user();
        $user->todos;
        return $this->successResponse([
            $user
        ]);
    }
}
