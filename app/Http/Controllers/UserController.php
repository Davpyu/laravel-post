<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->repository = $userRepositoryInterface;
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
