<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'name'
    ];

    public function orders()
    {
        return $this->hasMany(
            Order::class,
            'payment_id'
        );
    }

    public function carts()
    {
        return $this->hasMany(
            Cart::class,
            'payment_id'
        );
    }
}