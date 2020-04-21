<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserContract;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRepository extends Repository implements UserContract
{
    public function register(Request $request)
    {
        $user = User::create($request->all());
        if ($user) {
            return 'registered';
        }
    }

    public function login(Request $request)
    {
        if (! Auth::attempt($request->all())) {
            return 'login error';
        }
        return Auth::user();
    }

    public function logout()
    {
        return Auth::logout();
    }
}
