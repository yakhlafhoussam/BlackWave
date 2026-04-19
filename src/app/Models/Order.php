<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'buyer_id',
        'seller_id',
        'marketplace_id',
        'service_id',
        'price',
        'status',
    ];

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function marketplace()
    {
        return $this->belongsTo(Marketplace::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
