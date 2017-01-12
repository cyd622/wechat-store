<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PostCommentRepository;
use App\Entities\PostComment;
use App\Validators\PostCommentValidator;

/**
 * Class PostCommentRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PostCommentRepositoryEloquent extends BaseRepository implements PostCommentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PostComment::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
