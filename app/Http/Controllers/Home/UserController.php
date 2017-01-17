<?php
/**
 * Created by PhpStorm.
 * User: zyxcba
 * Date: 2017/1/12
 * Time: 下午10:42
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Repositories\UserRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\WxappRepositoryEloquent;


class UserController extends Controller
{
    protected $wxappRepository;
    protected $userRepository;

    public function __construct(
        WxappRepositoryEloquent $wxappRepository,
        UserRepositoryEloquent $userRepository
    )
    {
        $this->wxappRepository = $wxappRepository;
        $this->userRepository = $userRepository;

        $this->middleware('auth')->except('show');
    }

    public function index(Request $request)
    {
        return $this->show($request, Auth::id());
    }

    public function show(Request $request, $id)
    {
        $user = $this->userRepository->find($id);
        $wxapps = $this->wxappRepository->scopeQuery(function ($query) use ($id) {
            return $query->where('user_id', $id);
        })->orderBy('id', 'desc')->paginate(10);

        return view('home.user.index', compact('wxapps', 'user'));
    }
}