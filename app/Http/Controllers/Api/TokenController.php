<?php

namespace App\Http\Controllers\Api;

use App\Enums\Abilities;
use App\Events\GetTokenEvent;
use App\Exceptions\TokenException;
use App\Http\Controllers\Controller;
use App\Http\Requests\GetTokenRequest;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class TokenController extends Controller
{
    public function getToken(GetTokenRequest $request)
    {
        try {
            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                throw TokenException::wrongCredential();
            }

            $ablities = [];
            if ($user->privilege_id == 1) {
                $ablities = [Abilities::fullAccess()];
            } else {
                $ablities = [Abilities::limitedAccess()];
            }

            GetTokenEvent::dispatch($user);
            
            $dateTime       = Carbon::now();
            $tenMinuteAfter = $dateTime->addMinutes(1);

            return $this->successResponse([
                // add expires after one minitue
                'token' => $user->createToken('access-token', $ablities, $tenMinuteAfter)->plainTextToken
            ]);
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function revokeToken(Request $request){
        $user = $request->user();

        $user->currentAccessToken()->delete();

        return $this->successResponse([]);
    }
}
