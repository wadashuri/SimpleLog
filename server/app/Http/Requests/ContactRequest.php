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
            'last_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'content' => 'required|max:10000',
        ];
    }

    public function prepareForValidation()
    {
        $params = $this->request->all();

        foreach ($params as $key => $value) {
            // 前後の半角スペースを除去
            $item = trim($value);

            switch ($key) {
                case 'last_name':
                case 'first_name':
                case 'last_name_ruby':
                case 'first_name_ruby':
                    // 名前はスペース区切りで使用するため、全角スペースを半角スペースに変換した後、半角スペースを消去
                    $item = str_replace(' ', '', mb_convert_kana($item, 's'));
                    break;
            }

            $this->merge([$key => $item]);
        }
    }
}
