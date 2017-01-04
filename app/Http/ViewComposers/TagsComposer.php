<?php
/**
 * Created by PhpStorm.
 * User: zyxcba
 * Date: 2017/1/4
 * Time: 上午10:01
 */

namespace App\Http\ViewComposers;

use App\Repositories\TagRepositoryEloquent;
use Illuminate\View\View;

class TagsComposer
{

    public $tagRepository;

    public function __construct(TagRepositoryEloquent $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function compose(View $view)
    {
        $tags = $this->tagRepository->all();
        $view->with('tags', $tags);
    }

}