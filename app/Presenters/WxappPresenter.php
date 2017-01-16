<?php

namespace App\Presenters;

use App\Repositories\UserRepositoryEloquent;
use App\Transformers\WxappTransformer;
use Laracasts\Presenter\Presenter;
use App\Presenters\Traits\GenStars;


/**
 * Class WxappPresenter
 *
 * @package namespace App\Presenters;
 */
class WxappPresenter extends Presenter
{

    use GenStars;

    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new WxappTransformer();
    }

    public function genTags($max = 0)
    {
        $i = 1;
        $html = '';
        foreach($this->tags as $tag) {
            $html .= '<span>'.$tag->title.'</span>';

            if($max && $i >= $max)
                break;

            $i++;
        }

        return $html;
    }

    public function genAuthor()
    {
        $userRepostiory = app(UserRepositoryEloquent::class);
        $html = '';

        if($this->user_id && $user = $userRepostiory->find($this->user_id)) {
            $html .= $user->name.' 于 ';
        }

        $html .= $this->created_at.' 发布';

        return $html;
    }

}
