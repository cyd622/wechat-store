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
        View::composer([
            'widgets.tags',
            'widgets.tags_selector'
        ], 'App\Http\ViewComposers\TagsComposer');

        View::composer('widgets.auth_bg', 'App\Http\ViewComposers\AuthBgComposer');
        View::composer('widgets.wxapp_newest', 'App\Http\ViewComposers\NewestWxappsComposer');
        View::composer('widgets.wxapp_hotest', 'App\Http\ViewComposers\HotestWxappsComposer');
        View::composer('*', 'App\Http\ViewComposers\BrowserTypeComposer');
        View::composer('widgets.friendlinks', 'App\Http\ViewComposers\FriendLinkComposer');

        view()->composer('*', function ($view) {
            $view->with('currentUser', \Auth::user());
        });
    }

    public function register()
    {

    }
}