<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class WxappTag extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'wxapp_tag';

    protected $fillable = [
        'wxapp_id', 'tag_id'
    ];

}
