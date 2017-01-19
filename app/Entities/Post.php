<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Post extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'user_id', 'title','name', 'content',
        'source', 'source_url', 'source_id', 'image',
    ];

    public function category()
    {
        $this->belongsTo('App\Entities\Category');
    }
}
