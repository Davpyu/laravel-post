<?php

namespace App\Repositories\Interfaces;

use App\Post;
use Illuminate\Http\Request;

interface PostContract
{
    public const CACHE = 'POST';
    public function all();
    public function allFromUser(int $id);
    public function details(Post $post);
    public function save(Request $request);
    public function update(Post $post, Request $request);
    public function delete(Post $post);
}
