<?php
/**
 * Created by PhpStorm.
 * User: zyxcba
 * Date: 2017/1/4
 * Time: 上午9:58
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('widgets.tags', 'App\Http\ViewComposers\TagsComposer');
    }

    public function register()
    {

    }
}