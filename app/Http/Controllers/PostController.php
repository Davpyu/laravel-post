<?php

namespace App\Http\Controllers;

use App\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(PostRepository $postRepository)
    {
        $this->repository = $postRepository;
    }

    public function index()
    {
        return response()->json($this->repository->all(), 200);
    }

    public function show(Post $post)
    {
        return response()->json($this->repository->details($post), 200);
    }

    public function store(Request $request)
    {
        # code...
    }

    public function update(Post $post, Request $request)
    {
        # code...
    }

    public function delete(Post $post)
    {
        # code...
    }
}
