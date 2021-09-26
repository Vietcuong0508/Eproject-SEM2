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
            'fullName' => ['required', 'min:5', 'max:50'],
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
            'email.min' => 'Email tối thiểu là 5',
            'username.min' => 'Tài khoản tối thiểu là 5',
            'password.min' => 'Mật khẩu tối thiểu là 5',
            'fullName' => 'Họ là tên tối thiểu là 5',
            'phone.numeric' => 'Sô điện thoại là số',
            'phone.min' => 'Sô điện thoại tối thiểu là 9',


        ];
    }
}
