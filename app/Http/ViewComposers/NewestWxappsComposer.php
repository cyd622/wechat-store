<?php
/**
 * Created by PhpStorm.
 * User: zyxcba
 * Date: 2017/1/12
 * Time: 下午9:45
 */

namespace App\Http\ViewComposers;

use App\Criteria\NewestWxappsCriteria;
use App\Repositories\WxappRepositoryEloquent;
use Illuminate\View\View;


class NewestWxappsComposer
{
    protected $wxappRepository;

    public function __construct(WxappRepositoryEloquent $wxappRepository)
    {
        $this->wxappRepository = $wxappRepository;
        $this->wxappRepository->pushCriteria(new NewestWxappsCriteria());
    }

    public function compose(View $view)
    {

        $wxapp = $this->wxappRepository
            ->with('tags')
            ->paginate(5);

        $view->with('wxapps', $wxapp);

    }

}