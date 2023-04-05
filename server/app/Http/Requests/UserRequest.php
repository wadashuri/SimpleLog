<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|max:255',
            'password' => 'required|max:255',
        ];

        switch (request()->route()->getName()) {
            case 'admin.user.store':
                $rules['email'] = 'required|email:rfc|max:255|unique:users';
                break;
            case 'admin.user.update':
                $rules['email'] = 'required|email:rfc|max:255|unique:users,email,' . request()->route('user') . ',id';
                $rules['password'] = 'nullable|max:255';
                break;
        }

        return $rules;
    }
}
