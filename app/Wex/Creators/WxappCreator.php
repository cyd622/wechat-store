<?php
/**
 * Created by PhpStorm.
 * User: zyxcba
 * Date: 2017/1/12
 * Time: 下午2:22
 */

namespace Wex\Creators;

use App\Repositories\WxappRepositoryEloquent;
use App\Repositories\WxappTagRepositoryEloquent;
use App\Repositories\WxappScreenshotRepositoryEloquent;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Wex\Listeners\CreatorListener;
use Carbon\Carbon;
use Overtrue\Pinyin\Pinyin;


class WxappCreator
{

    protected $wxappRepository;
    protected $wxappTagRepository;
    protected $wxappScreenshotRepository;
    protected $py;

    public function __construct(
        WxappRepositoryEloquent $wxappRepository,
        WxappTagRepositoryEloquent $wxappTagRepository,
        WxappScreenshotRepositoryEloquent $wxappScreenshotRepository
    )
    {

        $this->wxappRepository = $wxappRepository;
        $this->wxappTagRepository = $wxappTagRepository;
        $this->wxappScreenshotRepository = $wxappScreenshotRepository;

        $this->py = new Pinyin();
    }

    public function create(CreatorListener $observer, $data)
    {
        if(!$data['tags']) {
            return $observer->creatorFailed('请选择应用标签!');
        }

        $data['user_id'] = Auth::id();
        $data['created_at'] = Carbon::now()->toDateTimeString();
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        $data['name'] = implode('-', $this->py->convert($data['title']));

        $wxapp = $this->wxappRepository->create($data);
        if (! $wxapp) {
            return $observer->creatorFailed('操作失败!');
        }

        // tags
        array_map(function ($tag) use ($wxapp) {
            $this->wxappTagRepository->updateOrCreate([
                'wxapp_id' => $wxapp->id,
                'tag_id' => $tag
            ]);
        }, $data['tags']);

        // screenshots
        array_map(function ($screens) use ($wxapp) {
            $wxappScreenshot=['wxapp_id' => $wxapp->id, 'image' => $screens];
            $this->wxappScreenshotRepository->updateOrCreate($wxappScreenshot, $wxappScreenshot);
        }, $data['screenshots']);

        return $observer->creatorSucceed($wxapp);
    }

}