<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'client_name',
        'product_or_service_name',
        'quantity',
        'total_price',
        'start_at',
        'end_at',
        'maded_by',
        'status_id',
        'user_id',
        'payment_id'  
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }
    public function status()
    {
         return $this->belongsTo(
            Status::class,
            'status_id'
        );
    }
    public function payment()
    {
         return $this->belongsTo(
            Payment::class,
            'payment_id'
        );
    }
}