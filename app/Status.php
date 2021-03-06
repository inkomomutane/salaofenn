<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'name'
    ];
    public function orders()
    {
        return $this->hasMany(
            Order::class,
            'status_id'
        );
    }
    public function carts()
    {
        return $this->hasMany(
            Cart::class,
            'status_id'
        );
    }
}