<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\WxappRatingRepository;
use App\Entities\WxappRating;
use App\Validators\WxappRatingValidator;

/**
 * Class WxappRatingRepositoryEloquent
 * @package namespace App\Repositories;
 */
class WxappRatingRepositoryEloquent extends BaseRepository implements WxappRatingRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return WxappRating::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
