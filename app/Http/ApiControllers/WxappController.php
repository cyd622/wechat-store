<?php

namespace App\Http\ApiControllers;

use App\Repositories\WxappRepositoryEloquent;
use Illuminate\Http\Request;


class WxappController extends ApiController
{

    public $wxappRepository;

    public function __construct(WxappRepositoryEloquent $wxappRepository)
    {
        $this->wxappRepository = $wxappRepository;
    }

    public function index()
    {

    }

    /**
     * wxapp 入库接口
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $ret = $this->wxappRepository->updateOrCreate([
            'source' => $request->get('source', ''),
            'source_id' => $request->get('source_id', 0),
            'title' => $request->get('title')
        ], $data);

        return $this->responseSuccess($ret);
    }

    public function show($id)
    {

    }

}
