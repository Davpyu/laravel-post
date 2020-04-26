<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface CommentContract
{
    public function save(Request $request);
}
