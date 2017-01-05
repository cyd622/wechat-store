<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\WxappRepository;
use App\Entities\Wxapp;
use App\Validators\WxappValidator;

/**
 * Class WxappRepositoryEloquent
 * @package namespace App\Repositories;
 */
class WxappRepositoryEloquent extends BaseRepository implements WxappRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Wxapp::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return WxappValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getFromeCache()
    {
        return $this->model->with('tags')->orderBy('id', 'desc')->paginate(12);
    }

}
