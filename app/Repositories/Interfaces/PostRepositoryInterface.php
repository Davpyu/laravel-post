<?php

namespace App\Repositories\Interfaces;

use App\Post;

interface PostRepositoryInterface
{
    const CACHE = 'POST';
    public function all();
    public function cacheAll();
    public function allFromUser(int $id);
    public function cacheAllFromUser(int $id);
    public function details(Post $post);
    public function cacheDetails(Post $post);
}
