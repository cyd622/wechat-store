<?php
/**
 * Created by PhpStorm.
 * User: zyxcba
 * Date: 2017/1/8
 * Time: 上午12:44
 */

namespace App\Http\ViewComposers;

use BrowserDetect;
use Illuminate\View\View;

class BrowserTypeComposer
{

    public function compose(View $view)
    {
        $bwType = 'pc';

        if(BrowserDetect::isMobile()) {
            $bwType = 'mobile';
        } elseif(BrowserDetect::isTablet()) {
            $bwType = 'tablet';
        }

        $view->with('browserType', $bwType);
    }

}