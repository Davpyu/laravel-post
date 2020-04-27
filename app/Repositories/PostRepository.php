<?php

namespace App\Repositories;

use App\Post;
use App\Repositories\Contracts\PostContract;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostRepository extends Repository implements PostContract
{
    public function all()
    {
        return Post::with('user:id,name')
            ->latest()
            ->simplePaginate(10);
    }

    public function allFromUser(int $id)
    {
        return $this->cacheAllFromUser($id);
    }

    public function details(Post $post)
    {
        return $this->cacheDetails($post);
    }

    public function search($keyword)
    {
        return Post::where('title', 'like', "%{$keyword}%")
            ->orWhere('content', 'like', "%{$keyword}%")
            ->with('user:id,name')
            ->latest()
            ->simplePaginate(10);
    }

    public function save(Request $request)
    {
        $post = Post::create($request->except('_token'));
        if (!$post) {
            return 'Ada kesalahan pada judul atau content';
        }
        $this->forgetCache([
            $this->getCacheKey(self::CACHE, "from.{$post->user_id}"),
        ]);
        $this->cacheAllFromUser($post->user_id);
        $this->cacheDetails($post);
        return 'saved';
    }

    public function update(Post $post, Request $request)
    {
        $post->update($request->except(['_method', '_token']));
        $this->forgetCache([
            $this->getCacheKey(self::CACHE, "details.{$post->id}"),
            $this->getCacheKey(self::CACHE, "from.{$post->user_id}"),
        ]);
        $this->cacheAllFromUser($post->user_id);
        $this->cacheDetails($post);
        return 'updated';
    }

    public function delete(Post $post)
    {
        $this->forgetCache([
            $this->getCacheKey(self::CACHE, "details.{$post->id}"),
            $this->getCacheKey(self::CACHE, "from.{$post->user_id}"),
        ]);
        $post->delete();
        return 'deleted';
    }

    private function cacheAllFromUser(int $id)
    {
        return Cache::remember(
            $this->getCacheKey(self::CACHE, "from.{$id}"),
            $this->getTTL(15),
            function () use ($id) {
                return User::with([
                    'post' => function ($query) {
                        $query->orderBy('created_at', 'desc');
                    },
                ])->find($id);
            }
        );
    }

    private function cacheDetails(Post $post)
    {
        return Cache::remember(
            $this->getCacheKey(self::CACHE, "details.{$post->id}"),
            $this->getTTL(15),
            function () use ($post) {
                return $post->load(['user', 'comment']);
            }
        );
    }
}
