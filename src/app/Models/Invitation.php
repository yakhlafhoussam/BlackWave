<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'sender_id',
    'email',
    'token',
    'status',
])]
class Invitation extends Model
{
    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}