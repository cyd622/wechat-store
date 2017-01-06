<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\WxappTagRepository;
use App\Entities\WxappTag;
use App\Validators\WxappTagValidator;

/**
 * Class WxappTagRepositoryEloquent
 * @package namespace App\Repositories;
 */
class WxappTagRepositoryEloquent extends BaseRepository implements WxappTagRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return WxappTag::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
