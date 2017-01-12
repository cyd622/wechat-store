<?php
/**
 * Created by PhpStorm.
 * User: zyxcba
 * Date: 2017/1/12
 * Time: 下午10:42
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {

        return view('home.user.index');
    }

}