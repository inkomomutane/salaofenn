<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
     
    protected $fillable = [
        'is_service',
        'short_description',
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
    public function tags()
    {
      return $this->belongsToMany(
            Tag::class,
            'product_tag',
            'product_id',
            'tag_id',
        )->using(ProductTag::class)->withTimestamps();
    }

    public function carts()
    {
        return $this->hasMany(
            Cart::class,
            'product_id'
        );
    }
    
     public function users()
    {
      return $this->belongsToMany(
            User::class,
            'product_user_favorites',
            'product_id',
            'user_id',
      )->using(ProductUserFavorite::class)->withTimestamps();
    }

      public function agendas()
    {
        return $this->belongsToMany(
            User::class,
            'product_user_agendas',
            'product_id',
            'user_id',
        )->using(ProductUserAgenda::class)->withPivot('id','title', 'start_at','end_at')->withTimestamps();
    }
    

}