<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'username',
    'profile_image',
    'gender',
    'points',
    'email',
    'is_admin',
    'is_banned',
    'ban_reason',
    'password',
    'google_id',
])]
#[Hidden([
    'password',
    'remember_token',
])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'points' => 'integer',
            'is_admin' => 'boolean',
            'is_banned' => 'boolean',
        ];
    }

    public function getProfileImageUrlAttribute(): string
    {
        if ($this->profile_image) {
            return asset('storage/' . $this->profile_image);
        }

        return asset('images/default-avatar.png');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function sentInvitations()
    {
        return $this->hasMany(Invitation::class, 'sender_id');
    }

    public function sentReports()
    {
        return $this->hasMany(Report::class, 'from_id');
    }

    public function receivedReports()
    {
        return $this->hasMany(Report::class, 'user_id');
    }

    public function sentRatings()
    {
        return $this->hasMany(Rating::class, 'from_user_id');
    }

    public function receivedRatings()
    {
        return $this->hasMany(Rating::class, 'to_user_id');
    }

    public function requests()
    {
        return $this->hasMany(RequestModel::class, 'user_id');
    }

    public function workerRequests()
    {
        return $this->hasMany(RequestModel::class, 'worker_service_id');
    }
}
