<?php

namespace App\Repositories;

use App\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostRepository extends Repository implements PostRepositoryInterface
{
    public function all()
    {
        return $this->cacheAll();
    }

    public function cacheAll()
    {
        return Cache::remember(
            $this->getCacheKey(self::CACHE, 'all'),
            $this->getTTL(15),
            function () {
                return Post::with('user:id,name')->paginate(10);
            }
        );
    }

    public function allFromUser(int $id)
    {
        return $this->cacheAllFromUser($id);
    }

    public function cacheAllFromUser(int $id)
    {
        return Cache::remember(
            $this->getCacheKey(self::CACHE, "from.{$id}"),
            $this->getTTL(15),
            function () use ($id) {
                return User::with('post')->find($id);
            }
        );
    }

    public function details(Post $post)
    {
        return $this->cacheDetails($post);
    }

    public function cacheDetails(Post $post)
    {
        return Cache::remember(
            $this->getCacheKey(self::CACHE, "details.{$post->id}"),
            $this->getTTL(15),
            function () use ($post) {
                return $post->load('comment');
            }
        );
    }

    public function save(Request $request)
    {
        $post = Post::create($request->all());
        $this->forgetCache([
            $this->getCacheKey(self::CACHE, "all"),
            $this->getCacheKey(self::CACHE, "from.{$post->user_id}")
        ])->cacheAll();
        $this->cacheAllFromUser($post->user_id);
        $this->cacheDetails($post);
        return 'saved';
    }

    public function update(Post $post, Request $request)
    {
        $post->update($request->except('_method'));
        $this->forgetCache([
            $this->getCacheKey(self::CACHE, "all"),
            $this->getCacheKey(self::CACHE, "details.{$post->id}"),
            $this->getCacheKey(self::CACHE, "from.{$post->user_id}")
        ])->cacheAll();
        $this->cacheAllFromUser($post->user_id);
        $this->cacheDetails($post);
        return 'updated';
    }

    public function delete(Post $post)
    {
        $this->forgetCache([
            $this->getCacheKey(self::CACHE, "all"),
            $this->getCacheKey(self::CACHE, "details.{$post->id}"),
            $this->getCacheKey(self::CACHE, "from.{$post->user_id}")
        ]);
        $post->delete();
        $this->cacheAll();
        return 'deleted';
    }
}
