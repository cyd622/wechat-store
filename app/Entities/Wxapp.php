<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Laracasts\Presenter\PresentableTrait;

class Wxapp extends Model implements Transformable
{
    use TransformableTrait;
    use PresentableTrait;

    protected $presenter = 'App\Presenters\WxappPresenter';

    protected $fillable = [];

    public function tags()
    {
        return $this->belongsToMany('App\Entities\Tag', 'wxapp_tag', 'wxapp_id', 'tag_id');
    }

    public function getRatingAttribute()
    {
        return sprintf("%.1f", $this->attributes['rating']);
    }

    public function comments()
    {
        return $this->hasMany('App\Entities\WxappRating');
    }

    public function screenShots()
    {
        return $this->hasMany('App\Entities\WxappScreenshot');
    }

}
