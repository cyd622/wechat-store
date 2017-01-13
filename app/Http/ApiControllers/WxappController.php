<?php

namespace App\Http\ApiControllers;

use App\Repositories\TagRepositoryEloquent;
use App\Repositories\WxappRepositoryEloquent;
use App\Repositories\WxappTagRepositoryEloquent;
use App\Repositories\WxappScreenshotRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Overtrue\Pinyin\Pinyin;


class WxappController extends ApiController
{

    public $wxappRepository;
    public $tagRepository;
    public $wxappTagRepository;
    public $wxappScreenshotRepository;
    public $py;

    public function __construct(
        WxappRepositoryEloquent $wxappRepository,
        TagRepositoryEloquent $tagRepository,
        WxappTagRepositoryEloquent $wxappTagRepository,
        WxappScreenshotRepositoryEloquent $wxappScreenshotRepository
    )
    {
        $this->wxappRepository = $wxappRepository;
        $this->tagRepository = $tagRepository;
        $this->wxappTagRepository = $wxappTagRepository;
        $this->wxappScreenshotRepository = $wxappScreenshotRepository;

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

        if(!$data['screens']) {
            Log::error('错误，缺少 screenshots 参数');
            abort(400);
        }

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

            array_map(function ($screens) use ($wxapp){
                $wxappScreenshot=['wxapp_id' => $wxapp->id,'image' => $screens];
                $this->wxappScreenshotRepository->updateOrCreate($wxappScreenshot, $wxappScreenshot);
            }, explode(',', $data['screens']));
        }

        return $this->responseSuccess($wxapp);
    }

    public function show($id)
    {
        return $this->responseSuccess($this->wxappRepository->find($id));
    }

}
