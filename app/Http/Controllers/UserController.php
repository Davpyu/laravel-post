<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserContract;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(UserContract $userContract)
    {
        $this->repository = $userContract;
    }

    public function register(Request $request)
    {
        return $this->repository->register($request);
    }

    public function login(Request $request)
    {
        return $this->repository->login($request);
    }

    public function logout()
    {
        return $this->repository->logout();
    }
}
