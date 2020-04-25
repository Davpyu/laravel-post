<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserContract;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRepository extends Repository implements UserContract
{
    public function dashboard()
    {
        return User::with(['post' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->find(Auth::user()->id);
    }

    public function register(Request $request)
    {
        $user = User::create($request->except('_token'));
        if ($user) {
            return 'registered';
        }
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->except('_token'))) {
            return 'Email atau Password salah';
        }
        return 'true';
    }

    public function logout()
    {
        return Auth::logout();
    }
}
