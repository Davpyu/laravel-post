<?php

namespace App\Repositories;

use App\Comment;
use App\Repositories\Contracts\CommentContract;
use Illuminate\Http\Request;

class CommentRepository extends Repository implements CommentContract
{
    public function save(Request $request)
    {
        $comment = Comment::create($request->except('_token'));
        if ($comment) {
            $this->forgetCache(["POST.DETAILS.{$comment->post_id}"]);
            return 'comment added';
        } else {
            return 'comment gagal';
        }
    }
}
