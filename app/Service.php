<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
      'name',
      'sub_category_id',
      'description',
      'image',
      'video',
      'price',
      'promotion',
      'published_at'
      
    ];

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
}