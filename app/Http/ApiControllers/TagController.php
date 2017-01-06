<?php
/**
 * Created by PhpStorm.
 * User: zyxcba
 * Date: 2017/1/6
 * Time: 下午9:44
 */

namespace App\Http\ApiControllers;


use App\Repositories\TagRepositoryEloquent;
use Illuminate\Http\Request;

class TagController extends ApiController
{

    public $tagRepository;

    public function __construct(TagRepositoryEloquent $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function index()
    {
        $this->responseSuccess($this->tagRepository->all());
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $ret = $this->tagRepository->updateOrCreate([
            'title' => $request->get('title')
        ], $data);

        return $this->responseSuccess($ret);
    }
}