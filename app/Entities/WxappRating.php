<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class WxappRating extends Model implements Transformable
{
    use TransformableTrait;
    use PresentableTrait;

    protected $presenter = 'App\Presenters\WxappRatingPresenter';

    protected $fillable = [
        'user_id', 'rating', 'comment',
        'created_at', 'updated_at', 'wxapp_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Entities\User');
    }

}
