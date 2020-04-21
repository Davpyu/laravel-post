<?php

namespace App\Repositories\Interfaces;

use App\Post;
use Illuminate\Http\Request;

interface PostRepositoryInterface
{
    const CACHE = 'POST';
    public function all();
    public function cacheAll();
    public function allFromUser(int $id);
    public function cacheAllFromUser(int $id);
    public function details(Post $post);
    public function cacheDetails(Post $post);
    public function save(Request $request);
    public function update(Post $post, Request $request);
    public function delete(Post $post);
}
