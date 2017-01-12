<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WxappCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'qrcode' => 'required',
            'icon' => 'required',
            'screenshots' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '请填写小程序标题',
            'description.required'  => '请填写小程序介绍',
            'qrcode.required'  => '请上传小程序二维码',
            'icon.required'  => '请上传小程序ICON',
            'screenshots.required'  => '请上传小程序截图',
        ];
    }
}
