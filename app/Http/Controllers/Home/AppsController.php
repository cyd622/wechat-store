<?php
/**
 * Created by PhpStorm.
 * User: zyxcba
 * Date: 2017/1/10
 * Time: 上午12:42
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Http\Requests\WxappCreateRequest;
use App\Repositories\WxappRepositoryEloquent;

use Log;
use Laracasts\Flash\Flash;
use Wex\Listeners\CreatorListener;

class AppsController extends Controller implements CreatorListener
{

    protected $wxappRepository;

    public function __construct(WxappRepositoryEloquent $wxappRepository)
    {

        $this->wxappRepository = $wxappRepository;

    }

    public function index()
    {

        return view('home.apps.index', compact('wxapps'));
    }

    public function create()
    {
        return view('home.apps.create');
    }

    public function store(WxappCreateRequest $request)
    {
        Log::debug('用户提交微信小程序');
        app('Wex\Creators\WxappCreator')->create($this, $request->except('_token'));
    }


    /**
     * ----------------------------------------
     * CreatorListener Delegate
     * ----------------------------------------
     */
    public function creatorFailed($errors)
    {
        Flash::error($errors);
        Log::error($errors);

        return redirect(route('apps.index'));
    }

    public function creatorSucceed($wxapp)
    {
        Log::debug('提交成功');
        Log::debug($wxapp);

        Flash::success(lang('Operation succeeded.'));
        return redirect(route('apps.index'));
    }

}