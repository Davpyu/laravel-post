<?php

namespace App\Http\Controllers;

use App\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(PostRepositoryInterface $postRepositoryInterface)
    {
        $this->repository = $postRepositoryInterface;
    }

    public function index()
    {
        $data = $this->repository->all();
        return view('', $data);
    }

    public function userPost(int $id)
    {
        return response()->json($this->repository->allFromUser($id), 200);
    }

    public function show(Post $post)
    {
        $data = $this->repository->details($post);
        return view('', $data);
    }

    public function store(Request $request)
    {
        return $this->repository->save($request);
    }

    public function update(Post $post, Request $request)
    {
        return $this->repository->update($post, $request);
    }

    public function destroy(Post $post)
    {
        return $this->repository->delete($post);
    }
}
