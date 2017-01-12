<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wex\Handler\Exception\ImageUploadException;


class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function upload(Request $request)
    {

        if ($file = $request->file('Filedata')) {
            try {
                $upload_status = app('Wex\Handlers\ImageUploadHandler')->uploadImage($file, $request->get('type'));
            } catch (ImageUploadException $exception) {
                return ['error' => $exception->getMessage()];
            }

            $data = [
                'fullpath' =>$upload_status['fullpath'],
                'filename' =>$upload_status['filename'],
                'type' => $request->get('type')
            ];
        } else {
            $data['error'] = 'Error while uploading file';
        }

        return $data;
    }

    public function check()
    {

    }
}
