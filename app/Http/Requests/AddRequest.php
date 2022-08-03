<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập email !',
            'name.required' => 'Vui lòng nhập tên !',
            'email.email' => 'Vui lòng nhập đúng định dạng email !',
            'password.required' => 'Vui lòng nhập mật khẩu !',
            'password.min' => 'Vui lòng nhập mật khẩu ít nhất 6 kí tự !',
            'password.confirmed' => 'Mật khẩu mới ko khớp!',
            'password_confirmation.required' => 'Mật khẩu mới chưa nhập!',
        ];

    }
}
