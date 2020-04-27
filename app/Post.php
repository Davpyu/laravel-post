<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
    ];

    protected $hidden = [
        'user_id',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    public function getOverviewAttribute()
    {
        $overview = explode(' ', $this->content, 51);
        $url = route('post.show', $this->slug);
        if (count($overview) === 51) {
            $overview[50] = "<a href='{$url}' class='no-underline text-sm text-teal-500 hover:text-teal-700'>... Read More &raquo;&raquo;&raquo;</a>";
        }
        return implode(' ', $overview);
    }
}
