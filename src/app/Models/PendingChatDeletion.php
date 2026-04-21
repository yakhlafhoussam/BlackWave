<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingChatDeletion extends Model
{
    protected $fillable = [
        'user1_id',
        'user2_id',
        'user1_rated',
        'user2_rated',
    ];
}
