<?php

namespace App\Http\Requests\xUser;

use App\Http\Requests\Request;

class addUserRequest extends Request
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
            'txtName' => 'required|min:4',
            'txtEmail' => 'required|unique:users,email|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9]+)*@[a-z0-9]([a-z0-9-][a-z0-9+)*(\.[a-z]{2,4}){1,2}$/',
            'txtPass' => 'required',
            'txtRePass' => 'required|same:txtPass',
        ];
    }
    public function messages()
    {
        return [
            'txtName.required' => 'Vui lòng nhập tên.',
            'txtName.min' => 'Username tối thiểu 4 kí tự',
            'txtEmail.unique' => 'Email đã tồn tại.',
            'txtEmail.required' => 'Vui lòng nhập email',
            'txtEmail.regex' => 'Địa chỉ email không hợp lệ.',
            'txtRePass.required' => 'Vui lòng nhập lại mật khẩu',
            'txtRePass.same' => 'Hai mật khẩu không trùng nhau',
            'txtRePass.required' => 'Vui lòng nhập email',
        ];
    }
}
