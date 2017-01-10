<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\WxappRepository;
use App\Entities\Wxapp;
use App\Validators\WxappValidator;
use BrowserDetect;

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
        if(BrowserDetect::isMobile()) {
            return $this->model->orderBy('id', 'desc')->simplePaginate(12);
        } else {
            return $this->model->orderBy('id', 'desc')->paginate(12);
        }
    }

}
