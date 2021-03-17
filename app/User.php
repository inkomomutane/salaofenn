<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
     use HasApiTokens , Notifiable,SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','disabled'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(
            Role::class,
            'role_id'
        );
    }

    public function orders()
    {
        return $this->hasMany(
            Order::class,
            'user_id'
        );
    }
    public function carts()
    {
        return $this->hasMany(
            Cart::class,
            'user_id'
        );
    }
      public function favorites()
    {
        return $this->belongsToMany(
            Product::class,
            'product_user_favorites',
            'user_id',
            'product_id'
        )->using(ProductUserFavorite::class)->withTimestamps();
    }
    public function agendas()
    {
        return $this->belongsToMany(
            Product::class,
            'product_user_agendas',
            'user_id',
            'product_id'
        )->using(ProductUserAgenda::class)->withPivot('id','title', 'start_at','end_at')->withTimestamps();
    }
}