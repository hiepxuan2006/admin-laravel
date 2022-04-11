<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
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
            //
            'name' => 'required|unique:users|min:4|max:255',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:6|max:255',
            'role_id' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên tài khoản',
            'name.unique' => 'Tên tài khoản đã được sử dụng',
            'name.min' => 'Tên tài khoản tối thiểu có 4 kí tự',
            'email.email' => 'Email không đúng định dạng',
            'email.required' => 'Vui lòng nhập email',
            'eamil.unique' => 'Email này đã được sử dụng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu tối thiểu có 6 kí tự',

        ];
    }
}
