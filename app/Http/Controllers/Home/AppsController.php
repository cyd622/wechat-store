<?php
/**
 * Created by PhpStorm.
 * User: zyxcba
 * Date: 2017/1/10
 * Time: 上午12:42
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;

class AppsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('users.apps.index');
    }

    public function create()
    {

        return view('users.apps.create');
    }

}