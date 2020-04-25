<?php

namespace App\Observers;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostObserver
{
    public function saving(Post $post)
    {
        $post->slug = Str::slug($post->title);
        $post->user_id = Auth::user()->id;
    }

    public function deleting(Post $post)
    {
        $post->comment()->delete();
    }
}
