<?php
/**
 * Created by PhpStorm.
 * User: zyxcba
 * Date: 2017/1/12
 * Time: 下午9:45
 */

namespace App\Http\ViewComposers;

use App\Criteria\HotestWxappsCriteria;
use Illuminate\View\View;
use App\Repositories\WxappRepositoryEloquent;


class HotestWxappsComposer
{
    protected $wxappRepository;

    public function __construct(WxappRepositoryEloquent $wxappRepository)
    {
        $this->wxappRepository = $wxappRepository;
        $this->wxappRepository->pushCriteria(new HotestWxappsCriteria());
    }

    public function compose(View $view)
    {
        $wxapps = $this->wxappRepository->with('tags')
            ->paginate(10);

        $view->with('wxapps', $wxapps);
    }

}