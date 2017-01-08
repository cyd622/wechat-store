<?php
/**
 * Created by PhpStorm.
 * User: zyxcba
 * Date: 2017/1/4
 * Time: 下午11:02
 */

namespace App\Entities;


use Illuminate\Database\Eloquent\Model;

class WxappScreenshot extends Model
{

    protected $fillable = [
        'wxapp_id', 'image',
    ];

}