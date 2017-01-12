<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FrindeLinksCriteria
 * @package namespace App\Criteria;
 */
class IndexFriendLinkCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {

        $model = $model->where('show_on_index', 'yes')
            ->where('status', 1)
            ->where('ignore', 'no')
            ->orderBy('baidu_rank');

        return $model;
    }
}
