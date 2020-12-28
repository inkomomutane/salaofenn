<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductTag extends Pivot
{
     protected $fillable = [
        'product_id',
        'tag_id'
    ];
}