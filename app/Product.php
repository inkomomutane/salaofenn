<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $fillable = [
        'sub_category_id',
        'fornecedor_id',
        'name',
        'description',
        'image',
        'video',
        'price',
        'sellable',
        'published_at',
        'promotion',
        'quantity',
        'actual_stock',
        'reserved_stock',
        'free_stock',
        'max_stock',
        'min_stock',
        'imposto'
    ];
    public function fornecedor()
    {
        return $this->belongsTo(
            Fornecedor::class,
            'fornecedor_id'
        );
    }

    public function subcategory()
    {
        return $this->belongsTo(
            SubCategory::class,
            'sub_category_id'
        );
    }
}