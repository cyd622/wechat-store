<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\WxappCreateRequest;
use App\Http\Requests\WxappUpdateRequest;
use App\Repositories\WxappRepository;
use App\Validators\WxappValidator;


class WxappsController extends Controller
{

    /**
     * @var WxappRepository
     */
    protected $repository;

    /**
     * @var WxappValidator
     */
    protected $validator;

    public function __construct(WxappRepository $repository, WxappValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $wxapps = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $wxapps,
            ]);
        }

        return view('wxapps.index', compact('wxapps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  WxappCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(WxappCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $wxapp = $this->repository->create($request->all());

            $response = [
                'message' => 'Wxapp created.',
                'data'    => $wxapp->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wxapp = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $wxapp,
            ]);
        }

        return view('wxapps.show', compact('wxapp'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $wxapp = $this->repository->find($id);

        return view('wxapps.edit', compact('wxapp'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  WxappUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(WxappUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $wxapp = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Wxapp updated.',
                'data'    => $wxapp->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Wxapp deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Wxapp deleted.');
    }
}
