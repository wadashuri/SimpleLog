<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|max:255',
            'password' => 'required|max:255',
        ];

        switch (request()->route()->getName()) {
            case 'master.admin.store'|| 'front.register':
                $rules['email'] = 'required|email:rfc|max:255|unique:admins';
                break;
            case 'master.admin.update':
                $rules['email'] = 'required|email:rfc|max:255|unique:admins,email,' . request()->route('admin') . ',id';
                $rules['password'] = 'nullable|max:255';
                break;
        }

        return $rules;
    }
}
