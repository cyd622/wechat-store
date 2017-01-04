<?php

namespace App\Presenters;

use App\Transformers\WxappTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class WxappPresenter
 *
 * @package namespace App\Presenters;
 */
class WxappPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new WxappTransformer();
    }
}
