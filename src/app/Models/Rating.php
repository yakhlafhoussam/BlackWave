<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'from_user_id',
    'to_user_id',
    'stars',
    'comment',
])]
class Rating extends Model
{
    protected function casts(): array
    {
        return [
            'stars' => 'integer',
        ];
    }

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }
}