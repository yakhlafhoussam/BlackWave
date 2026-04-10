<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'user_id',
    'worker_service_id',
    'type',
    'request_status',
    'requested_at',
    'points_spent',
])]
class RequestModel extends Model
{
    protected $table = 'requests';

    protected function casts(): array
    {
        return [
            'requested_at' => 'datetime',
            'points_spent' => 'integer',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_service_id');
    }
}