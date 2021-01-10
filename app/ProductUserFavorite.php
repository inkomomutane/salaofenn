<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductUserFavorite extends Pivot
{
    protected $fillable = [
       'product_id',
        'user_id'  
    ];
}