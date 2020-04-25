<?php

namespace App\Repositories;

use App\Comment;
use App\Repositories\Contracts\CommentContract;
use Illuminate\Http\Request;

class CommentRepository extends Repository implements CommentContract
{
    public function save(array $array)
    {
        $post = Comment::create($array);
        if ($post) {
            return 'comment added';
        }
    }
}
