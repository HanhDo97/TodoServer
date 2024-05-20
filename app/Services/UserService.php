<?php

namespace App\Services;

use App\Filters\User\GetByEmail;
use App\Filters\User\GetByName;
use App\Models\User;
use Illuminate\Support\Facades\Pipeline;

class UserService
{
    public static function find($id){
        return User::findOrFail($id);
    }

    public static function getUsersByNameOrEmail($text)
    {
        $pipes = [
            GetByName::class,
            GetByEmail::class,
        ];
        return Pipeline::send(User::select('*'))
            ->through($pipes)->then(fn ($user) => $user->get()->take(15));
    }
}
