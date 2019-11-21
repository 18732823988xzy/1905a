<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreNewsPost extends FormRequest
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
        ['news_title'=>[
            'required',
            Rule::unique('news')->ignore(request()->news_id,'news_id'),
                ],
        ];

    }
    public function messages()
    {
        return[
            'news_title.required'=>'品牌名称必填',
            'news_title.unique'=>'品牌名称已存在',
        ];
    }
}
