<?php

/**
 * Created by PhpStorm.
 * User: zyxcba
 * Date: 2017/1/16
 * Time: 下午11:41
 */

namespace App\Presenters\Traits;


trait GenStars
{
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
}