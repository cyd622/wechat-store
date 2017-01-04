<?php

namespace App\Http\Controllers;


use App\Repositories\TagRepositoryEloquent;
use App\Repositories\WxappRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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


        return view('pages.index');
    }

    public function show()
    {

        return view('pages.show');
    }
}
