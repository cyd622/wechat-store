<?php
/**
 * Created by PhpStorm.
 * User: zyxcba
 * Date: 2017/1/4
 * Time: 上午10:01
 */

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthBgComposer
{

    public function __construct()
    {

    }

    public function compose(View $view)
    {
        if(!$bgId = Session::get('bg_id')) {
            $bgId = mt_rand(1, 10);
            Session::set('bg_id', $bgId);
        }

        $view->with('bgId', $bgId);
    }

}