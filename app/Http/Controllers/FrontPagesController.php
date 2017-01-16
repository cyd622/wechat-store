<?php

namespace App\Http\Controllers;


use App\Entities\WxappRating;
use App\Http\Requests\CommentCreateRequest;
use App\Repositories\TagRepositoryEloquent;
use App\Repositories\WxappRatingRepositoryEloquent;
use App\Repositories\WxappRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use BrowserDetect;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use PhpParser\Comment;


class FrontPagesController extends Controller
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

        $this->middleware('auth')->only('comment');
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
        $currentWxapp = $this->wxappRepository->with('comments')->find($id);

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

    public function comment(CommentCreateRequest $request, $id)
    {
        $ratingRepository = App::make(WxappRatingRepositoryEloquent::class);
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['wxapp_id'] = $id;

        $ratingRepository->create($data);

        Flash::success(lang('Operation succeeded.'));
        return redirect(route('detail', $id));
    }

    public function wiki()
    {

    }

    public function search(Request $request)
    {

    }
}
