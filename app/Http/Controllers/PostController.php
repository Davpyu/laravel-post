<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Repositories\Contracts\PostContract;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(PostContract $postContract)
    {
        $this->middleware('auth')->except(['index', 'show', 'userPost']);
        $this->repository = $postContract;
    }

    public function index()
    {
        $response = $this->repository->all();
        return view('posts.index', compact('response'));
    }

    public function create()
    {
        return view('posts.forms');
    }

    public function search()
    {
        $keyword = request()->keyword;
        $search = $this->repository->search($keyword);
        return view('posts.search', compact('search'));
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

    public function edit(Post $post)
    {
        return view('posts.forms', ['response' => $post]);
    }

    public function store(PostRequest $request)
    {
        $data = $this->repository->save($request);
        if ($data === 'saved') {
            return redirect()->route('post.index');
        } else {
            return redirect()->back()->with('errorCreate', $data);
        }
    }

    public function update(Post $post, PostRequest $request)
    {
        $data = $this->repository->update($post, $request);
        if ($data === 'updated') {
            return redirect()->route('auth.dashboard')->with('success', 'Updated data success');
        }
    }

    public function destroy(Post $post)
    {
        $data = $this->repository->delete($post);
        if ($data === 'deleted') {
            return redirect()->back()->with('success', 'Delete Post Successfully');
        }
    }
}
