<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;


/**
 * Class WxappPresenter
 *
 * @package namespace App\Presenters;
 */
class UserPresenter extends Presenter
{

    public function getAvatar()
    {
        if($this->avatar)
            return qiniu_cdn($this->avatar);
        else
            return cdn('images/default_avatar.png');
    }

}
