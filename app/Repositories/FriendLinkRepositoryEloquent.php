<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\FriendLinkRepository;
use App\Entities\FriendLink;
use App\Validators\FriendLinkValidator;

/**
 * Class FriendLinkRepositoryEloquent
 * @package namespace App\Repositories;
 */
class FriendLinkRepositoryEloquent extends BaseRepository implements FriendLinkRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FriendLink::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
