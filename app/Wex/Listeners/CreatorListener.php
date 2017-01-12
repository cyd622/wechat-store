<?php
/**
 * Created by PhpStorm.
 * User: zyxcba
 * Date: 2017/1/12
 * Time: 下午2:24
 */

namespace Wex\Listeners;


interface CreatorListener
{
    public function creatorFailed($errors);
    public function creatorSucceed($model);
}
