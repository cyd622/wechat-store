<?php

namespace App\Http\ApiControllers;

use App\Http\Requests\WxappCreateRequest;
use App\Repositories\TagRepositoryEloquent;
use App\Repositories\WxappRepositoryEloquent;
use App\Repositories\WxappTagRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Overtrue\Pinyin\Pinyin;


class WxappController extends ApiController
{

    public $wxappRepository;
    public $tagRepository;
    public $wxappTagRepository;
    public $py;

    public function __construct(
        WxappRepositoryEloquent $wxappRepository,
        TagRepositoryEloquent $tagRepository,
        WxappTagRepositoryEloquent $wxappTagRepository
    )
    {
        $this->wxappRepository = $wxappRepository;
        $this->tagRepository = $tagRepository;
        $this->wxappTagRepository = $wxappTagRepository;

        $this->py = new Pinyin();
    }

    /**
     * wxapp 入库接口
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        Log::debug('wxapp 入库接口');

        $data = $request->all();
        $data = array_merge($data, [
            'rating' => 0, 'likes' => 0, 'status' => 1,
            'name' => implode('-', $this->py->convert($data['title']))
        ]);

        Log::debug('data', $data);

        $wxapp = $this->wxappRepository->updateOrCreate([
            'source' => $request->get('source', ''),
            'source_id' => $request->get('source_id', 0),
            'title' => $request->get('title')
        ], $data);

        Log::debug('ret', $wxapp->toArray());

        if($wxapp->id) {
            // create tag
            array_map(function($tagName) use ($wxapp) {

                Log::debug($tagName);

                $tagData = [
                    'title' => $tagName,
                    'name' => implode('-', $this->py->convert($tagName))
                ];

                $tag = $this->tagRepository->updateOrCreate(['title' => $tagName], $tagData);

                Log::debug('tag');
                Log::debug($tag);

                $wxappTagData = [
                    'wxapp_id' => $wxapp->id,
                    'tag_id' => $tag->id
                ];

                $this->wxappTagRepository->updateOrCreate($wxappTagData, $wxappTagData);

            }, explode(',', $data['tags']));
        }

        return $this->responseSuccess($wxapp);
    }

    public function show($id)
    {
        return $this->responseSuccess($this->wxappRepository->find($id));
    }

}
