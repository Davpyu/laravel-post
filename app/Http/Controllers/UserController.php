<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Contracts\UserContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function __construct(UserContract $userContract)
    {
        $this->repository = $userContract;
    }

    public function dashboard()
    {
        $response = $this->repository->dashboard();
        return view('user.dashboard', compact('response'));
    }

    public function register(RegisterRequest $request)
    {
        $response = $this->repository->register($request);
        if ($response === 'registered') {
            return redirect()->route('auth.form.login')->with('success', 'Register Success');
        }
    }

    public function login(LoginRequest $request)
    {
        $data = $this->repository->login($request);
        if (Auth::check()) {
            return redirect()->route('post.index');
        } else {
            return redirect()->back()->with('errorsLogin', $data);
        }
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function logout()
    {
        $this->repository->logout();
        return redirect()->route('post.index');
    }
}
