<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Laravel\Sanctum\Exceptions\MissingAbilityException;

class CheckForAnyAbility
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$abilities
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Auth\AuthenticationException|\Laravel\Sanctum\Exceptions\MissingAbilityException
     */
    public function handle($request, $next, ...$abilities)
    {
        $user = auth()->guard('sanctum')->user();

        if (!$user || !$user->currentAccessToken()) {
            throw new AuthenticationException;
        }

        foreach ($abilities as $ability) {
            if ($user->tokenCan($ability)) {
                return $next($request);
            }
        }

        throw new AuthorizationException('This action is unauthorized');
    }
}
