<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductUserAgenda extends Pivot
{
    protected $fillable = [
        'product_id',
        'title',
        'user_id',
        'start_at',
        'end_at'  
    ];
}