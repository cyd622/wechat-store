<?php
/**
 * Created by PhpStorm.
 * User: zyxcba
 * Date: 2017/1/4
 * Time: 上午10:01
 */

namespace App\Http\ViewComposers;

use App\Criteria\IndexFriendLinkCriteria;
use App\Repositories\FriendLinkRepositoryEloquent;
use Illuminate\View\View;

class FriendLinkComposer
{

    public $repository;

    public function __construct(FriendLinkRepositoryEloquent $flRepository)
    {
        $this->repository = $flRepository;
        $this->repository->pushCriteria(new IndexFriendLinkCriteria());
    }

    public function compose(View $view)
    {
        $links = $this->repository->paginate(20);

        $view->with('links', $links);
    }

}