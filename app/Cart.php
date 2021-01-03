<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
     use SoftDeletes;
     
   protected $fillable = [
       'product_id',
       'quantity',
       'price',
       'status_id',
       'user_id',
       'descount',
       'payment_id'
   ];

   public function product()
   {
        return $this->belongsTo(
            Product::class,
            'product_id'
    );
   }

   public function status()
   {
        return $this->belongsTo(
            Status::class,
            'status_id'
    );
   }

   public function user()
   {
        return $this->belongsTo(
            User::class,
            'user_id'
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