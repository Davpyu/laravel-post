<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Repositories\Contracts\CommentContract;

class CommentController extends Controller
{
    public function __construct(CommentContract $commentContract)
    {
        $this->repository = $commentContract;
    }

    public function store(CommentRequest $request)
    {
        $data = $this->repository->save($request);
        if ($data === 'comment added') {
            return redirect()->back()->with('success', $data);
        } else {
            return redirect()->back()->with('gagal', $data);
        }
    }
}
