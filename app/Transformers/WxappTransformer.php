<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Wxapp;

/**
 * Class WxappTransformer
 * @package namespace App\Transformers;
 */
class WxappTransformer extends TransformerAbstract
{

    /**
     * Transform the \Wxapp entity
     * @param \Wxapp $model
     *
     * @return array
     */
    public function transform(Wxapp $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
