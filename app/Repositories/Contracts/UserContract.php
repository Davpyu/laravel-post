<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface UserContract
{
    public function dashboard();
    public function register(Request $request);
    public function login(Request $request);
    public function logout();
}
