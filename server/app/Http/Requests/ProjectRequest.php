<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'date' => 'required',
            'progress' => 'nullable|integer|between:0,100',
            'name' => 'required|max:255',
            'status' => 'integer|between:0,10',
            'customer_manager' => 'max:255',
            'cost' => 'required|integer|between:0,100000000',
            'gross_profit' => 'required|integer|between:0,100000000',
            'description' => 'max:10000',
        ];
    }
}
