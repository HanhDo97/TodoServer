<?php

namespace App\Http\Controllers\Api;

use App\Events\InviteNotificationEvent;
use App\Events\InviteProjectBroadcastEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\ProjectService;
use App\Services\ValidateService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function inviteUser(Request $request)
    {
        ValidateService::validateRequired($request, ['uI', 'rC', 'pI']);

        $user    = UserService::find($request->uI);
        $project = ProjectService::find($request->pI);
        $data    = [
            'role'    => $request->rC,
            'user'    => $user,
            'project' => $project,
        ];
        
        
        InviteNotificationEvent::dispatch($data);
        event(new InviteProjectBroadcastEvent($data));

        return
            $this->successResponse(['message'=>'We have sent a consent message to '.$user->name]);
    }
    public function searchEmailOrName(Request $request)
    {
        ValidateService::validateRequired($request, ['qrTxt']);

        $users = UserService::getUsersByNameOrEmail($request->qrTxt);

        return $this->successResponse($users);
    }
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
