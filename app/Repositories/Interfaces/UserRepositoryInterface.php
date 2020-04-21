<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function register(Request $request);
    public function login(Request $request);
    public function logout();
}
