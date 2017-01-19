<?php
/**
 * Created by PhpStorm.
 * User: zyxcba
 * Date: 2017/1/17
 * Time: 下午11:34
 */

namespace App\Http\ApiControllers;


use App\Http\Requests\ArticleApiCreateRequest;
use App\Repositories\PostRepositoryEloquent;
use Illuminate\Support\Facades\App;
use Overtrue\Pinyin\Pinyin;

class PostController extends ApiController
{

    protected $postRepository;
    protected $py;

    public function __construct()
    {
        $this->postRepository = App::make(PostRepositoryEloquent::class);
        $this->py = new Pinyin();
    }

    public function store(ArticleApiCreateRequest $request)
    {
        $data = $request->all();
        $data['name'] = join('-', $this->py->convert($data['title']));

        $article = $this->postRepository->updateOrCreate([
            'source' => $data['source'],
            'source_id' => $data['source_id'],
            'title' => $data['title']
        ], $data);

        return $this->responseSuccess($article);
    }
}