<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Category extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'categories';
    protected $fillable = [
        'parent_id', 'post_count', 'weight',
        'name', 'slug', 'description',
        'type'
    ];


    public function posts()
    {
        $this->hasMany('App\Entities\Post');
    }

}
