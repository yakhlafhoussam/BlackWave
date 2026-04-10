<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'from_id',
    'user_id',
    'post_id',
    'comment_id',
    'reason',
])]
class Report extends Model
{
    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_id');
    }

    public function reportedUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}