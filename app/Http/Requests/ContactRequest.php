<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'type'=>'required',
            'type.*'=>'in:サービスについて,トラブル・相談,その他',
            'name'=>'required|max:10',
            'email'=>'required|email',
            'gender'=>'required|in:男性,女性,回答しない',
            'body'=>'required|max:1000'
        ];
    }

    public function attributes(){
        return [
            'type'=>'お問い合わせ種類',
            'name'=>'お名前',
            'email'=>'メールアドレス',
            'gender'=>'性別',
            'body'=>'内容'
        ];
    }
}
