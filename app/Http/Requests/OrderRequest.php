<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'shipName' => ['required'],
            'shipAddress' => ['required'],
            'shipPhone' => ['required', 'numeric', 'min:9'],
            'email' =>  ['required'],
        ];
    }

    public function messages()
    {
        return [
            'shipName.required' => 'Vui lòng nhập họ và tên',
            'shipAddress.required' => 'Vui lòng nhập địa chỉ',
            'shipPhone.required' => 'Vui lòng nhập số điện thoại',
            'email.required' => 'Vui lòng nhập email',
            'shipPhone.numeric' => 'Số điện thoại phải là số',
            'shipPhone.min' => 'Số điện thoại tối thiểu là 9 số',
        ];
    }
}
