<?php

namespace App\Http\Controllers;


use App\Repositories\TagRepositoryEloquent;
use App\Repositories\WxappRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use BrowserDetect;


class PagesController extends Controller
{
    protected $tagRepository;
    protected $wxappRepository;

    public function __construct()
    {
        $this->tagRepository = App::make(TagRepositoryEloquent::class);
        $this->wxappRepository = App::make(WxappRepositoryEloquent::class);
        $this->wxappRepository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        $bwType = 'desktop';

        if(BrowserDetect::isMobile()) {
            $bwType = 'mobile';
        } elseif(BrowserDetect::isTablet()) {
            $bwType = 'tablet';
        }

        view()->share('browserType', $bwType);
    }

    public function index(Request $request)
    {
        $wxapps = $this->wxappRepository->getFromeCache();
        return view('pages.index', compact('wxapps'));
    }

    public function tag($tagId)
    {
        $currentTag = $this->tagRepository->find($tagId);

        if(BrowserDetect::isMobile()) {
            $wxapps = $currentTag->wxapps()->simplePaginate(12);
        } else {
            $wxapps = $currentTag->wxapps()->paginate(12);
        }

        return view('pages.index', compact('wxapps', 'currentTag'));
    }

    public function show($id)
    {
        $currentWxapp = $this->wxappRepository->find($id);

        if(!$currentWxapp)
            abort(404);

        return view('pages.show', compact('currentWxapp'));
    }

    public function news()
    {

        return view('pages.news');
    }

    public function article()
    {

    }

    public function wiki()
    {

    }

    public function search(Request $request)
    {

    }
}
