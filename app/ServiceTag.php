<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ServiceTag extends Pivot
{
    protected $fillable = [
        'service_id',
        'tag_id'
    ];
  
}