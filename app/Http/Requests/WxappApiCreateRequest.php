<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WxappApiCreateRequest extends FormRequest
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
            'user_id' => 'required',
            'description' => 'required',
            'qrcode' => 'required',
            'icon' => 'required',
            'source' => 'required',
            'source_id' => 'required',
        ];
    }
}
