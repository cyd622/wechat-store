<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\WxappScreenshotRepository;
use App\Entities\WxappScreenshot;


/**
 * Class TagRepositoryEloquent
 * @package namespace App\Repositories;
 */
class WxappScreenshotRepositoryEloquent extends BaseRepository implements WxappScreenshotRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return WxappScreenshot::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
