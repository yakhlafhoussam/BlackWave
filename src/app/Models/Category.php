<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'name',
    'color',
    'icon',
])]
class Category extends Model
{
    public function posts()
    {
        return $this->hasMany(Post::class, 'categorie_id');
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function marketplaces()
    {
        return $this->hasMany(Marketplace::class);
    }
}