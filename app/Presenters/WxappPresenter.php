<?php

namespace App\Presenters;

use App\Repositories\UserRepositoryEloquent;
use App\Transformers\WxappTransformer;
use Laracasts\Presenter\Presenter;


/**
 * Class WxappPresenter
 *
 * @package namespace App\Presenters;
 */
class WxappPresenter extends Presenter
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

    public function genStars()
    {
        $rating = sprintf('%.2f', $this->rating);
        list($rInteger, $rDecimal) = explode('.', $rating);

        $fullStars = $rInteger;
        $halfStars = 0;
        $emptyStars = 0;

        if((int)$rDecimal == 0) {
            $emptyStars = 5 - $fullStars;
        } else {
            $halfStars = 1;
            $emptyStars = 5 - 1 - $fullStars;
        }

        $html = '';

        $i = 0;
        while($i < $fullStars) {
            $html .= '<i class="fa fa-star star" aria-hidden="true"></i>';
            $i++;
        }

        $i = 0;
        while($i < $halfStars) {
            $html .= '<i class="fa fa-star-half-o star star-half" aria-hidden="true"></i>';
            $i++;
        }

        $i = 0;
        while($i < $emptyStars) {
            $html .= '<i class="fa fa-star-o star start-empty" aria-hidden="true"></i>';
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
