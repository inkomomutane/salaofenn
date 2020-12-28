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
        return $this->belongsTo(
            'service_tag',
            'service_id',
            'tag_id'
        )->using(ServiceTag::class)->withtimestamp();
    }
}