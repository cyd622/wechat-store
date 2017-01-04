<?php

namespace App\Http\Controllers;


use App\Repositories\TagRepositoryEloquent;
use App\Repositories\WxappRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;

class PagesController extends Controller
{
    protected $tagRepository;
    protected $wxappRepository;

    public function __construct()
    {
        $this->tagRepository = App::make(TagRepositoryEloquent::class);

        $this->wxappRepository = App::make(WxappRepositoryEloquent::class);
        $this->wxappRepository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
    }

    public function index()
    {
        $wxapps = $this->wxappRepository->getFromeCache();
        return view('pages.index', compact('wxapps'));
    }

    public function tag($tagId)
    {
        $currentTag = $this->tagRepository->find($tagId);
        $wxapps = $currentTag->wxapps()->paginate(12);

        return view('pages.index', compact('wxapps', 'currentTag'));
    }

    public function show()
    {

        return view('pages.show');
    }
}
