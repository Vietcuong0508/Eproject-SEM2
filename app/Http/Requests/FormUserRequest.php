<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormUserRequest extends FormRequest
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
            'fullName' => ['required', 'min:5'],
            'phone' => ['numeric', 'required', 'min:9'],
            'email' => ['required', 'min:5'],
            'address' => ['required',],
            'username' =>  ['required', 'min:5'],
            'password' =>  ['required', 'min:5'],
        ];
    }

    public function messages()
    {
        return [
            'fullName.required' => 'Vui lòng nhập họ và tên',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'email.required' => 'Vui lòng nhập email',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'username.required' => 'Vui lòng nhập tài khoản',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'email.min' => 'Email tối thiểu là 5 ký tự',
            'username.min' => 'Tài khoản tối thiểu là 5 ký tự',
            'password.min' => 'Mật khẩu quá yếu',
            'fullName.min' => 'Họ là tên tối thiểu là 5 ký tự',
            'phone.numeric' => 'Số điện thoại phải là số',
            'phone.min' => 'Số điện thoại tối thiểu là 9 số',


        ];
    }
}
