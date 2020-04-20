<?php

namespace App\Repositories;

use App\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class PostRepository extends Repository implements PostRepositoryInterface
{
    public function all()
    {
        return $this->cacheAll();
    }

    public function cacheAll()
    {
        return Cache::remember($this->getCacheKey(self::CACHE, 'all'), $this->getTTL(15), function () {
            return Post::with('user:id,name')->paginate(10);
        });
    }

    public function allFromUser(int $id)
    {
        return $this->cacheAllFromUser($id);
    }

    public function cacheAllFromUser(int $id)
    {
        return Cache::remember($this->getCacheKey(self::CACHE, "from.{$id}"), $this->getTTL(15), function () use ($id) {
            return Post::where('user_id', $id)->paginate(10);
        });
    }

    public function details(Post $post)
    {
        return $this->cacheDetails($post);
    }

    public function cacheDetails(Post $post)
    {
        return Cache::remember($this->getCacheKey(self::CACHE, "details.{$post->id}"), $this->getTTL(15), function () use ($post) {
            return $post->load('comment');
        });
    }
}
