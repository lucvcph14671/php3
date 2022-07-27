<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdatearequest extends FormRequest
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
        return [

            'name' => 'required|min:6|max:15',
            'email' => 'required|email',
  
        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'Nhập tên',
            'name.min' => 'Nhập 6 kí tự',
            'name.max' => 'Nhập quá 15 kí tự',
            'email.required' => 'Nhập email',
            'email.email' => 'Nhập đúng email',

        ];
    }
}
