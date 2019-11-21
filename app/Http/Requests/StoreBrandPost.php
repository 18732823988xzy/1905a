<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreBrandPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
//        echo request()->brand_id;die;
        return
//            'brand_name' => 'bail|required|unique:brand',
        ['brand_name'=>[
            'required',
            Rule::unique('brand')->ignore(request()->brand_id,'brand_id'),
                ],
            'brand_url' => 'bail|required|unique:brand',
        ];

    }
    public function messages()
    {
        return[
            'brand_name.required'=>'品牌名称必填',
            'brand_url.required'=>'品牌网址必填',
            'brand_name.unique'=>'品牌名称已存在',
            'brand_url.unique'=>'品牌网址已存在',
        ];
    }
}
