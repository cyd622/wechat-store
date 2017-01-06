<?php
/**
 * Created by PhpStorm.
 * User: zyxcba
 * Date: 2017/1/6
 * Time: 下午3:07
 */

namespace App\Http\ApiControllers;


class ApiController extends Controller
{

    //

    protected $statusCode = 200;

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;

    }


    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function responseNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(404)->responseError($message);
    }

    public function responseError($message)
    {
        return $this->response(
            [
                'status' => 'failed',
                'error' => [
                    'status_code' => $this->getStatusCode(),
                    'message' => $message
                ]
            ]
        );
    }

    public function responseSuccess($data)
    {
        return $this->setStatusCode(200)->response(
            [
                'status' => 'success',
                'data' => $data
            ]
        );
    }

    public function response($data)
    {
        return \Response::json( $data , $this->getStatusCode() );
    }


}