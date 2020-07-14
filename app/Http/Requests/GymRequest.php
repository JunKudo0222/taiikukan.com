<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GymRequest extends FormRequest
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
        return [
            'name' => 'required',
            'openhour' => 'required',
            'closehour' => 'required',
            'detail' => 'required',
            'area' => 'required',
            'prefecture' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'price' => 'required',
            'weeks' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10240',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '施設名は必須です。',
            'openhour.required' => '開館時間は必須です。',
            'closehour.required' => '閉館時間は必須です。',
            'detail.required' => '詳細は必須です。',
            'area.required' => '市町村は必須です。',
            'prefecture.required' => '都道府県は必須です。',
            'email.required' => 'メールアドレスは必須です。',
            'phonenumber.required' => '電話番号は必須です。',
            'price.required' => '価格は必須です。',
            'weeks.required' => '営業日は必須です。',
            'image.mimes'  => 'ファイルタイプをjepg,jpg,png,gifに設定してください',
            'image.max' => 'ファイルサイズを10MB以下に設定してください',
        ];
    }
}