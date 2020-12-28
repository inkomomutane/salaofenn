<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;
    protected $fillable =[
        'name'
    ];

    public function services()
    {
        return $this->belongsToMany(
            Service::class,
            'service_tag',
            'tag_id',
            'service_id'
        )->using(ServiceTag::class)->withTimestamps();
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'product_tag',
            'tag_id',
            'product_id'
        )->using(ProductTag::class)->withTimestamps();
    }
}