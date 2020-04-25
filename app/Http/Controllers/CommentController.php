<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CommentContract;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(CommentContract $commentContract)
    {
        $this->repository = $commentContract;
    }

    public function store(Request $request, $id)
    {
        $data = $request->all();
        $data['post_id'] = $id;
        return $this->repository->save($data);
    }
}
