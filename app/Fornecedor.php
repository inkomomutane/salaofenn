<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $fillable = [
        'name',
        'contact',
        'email'
    ];

    public function products()
    {
        return $this->hasMany(
            Product::class,
            'fornecedor_id'
        );
    }
}