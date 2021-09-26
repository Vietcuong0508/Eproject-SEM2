<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormProductRequest extends FormRequest
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
            'name' => ['required', 'min:3'],
            'thumbnail' => ['required'],
            'gardenName' => ['required', 'min:5'],
            'category' => ['required'],
            'weight' =>  ['required'],
            'vitamin' =>  ['required', 'min:3'],
            'nutrient' =>  ['required', 'min:3'],
            'price' =>  ['numeric', 'required', 'min:2'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'thumbnail.required' => 'Vui lòng thêm hình ảnh sản phẩm',
            'gardenName.required' => 'Vui lòng nhập tên nhà vườn',
            'category.required' => 'Vui lòng nhập thể loại sản phẩm',
            'weight.required' => 'Vui lòng nhập cân nặng sản phẩm',
            'vitamin.required' => 'Vui lòng nhập vitamin sản phẩm',
            'nutrient.required' => 'Vui lòng nhập chất ding dưỡng sản phẩm',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'name.min' => 'Tên sản phẩm tối thiểu 3 ký tự',
            'gardenName.min' => 'Tên nhà vườn tối thiểu 5 ký tự',
            'vitamin.min' => 'Vitamin tối thiểu 3 ký tự',
            'nutrient.min' => 'Chất dinh dưỡng tối thiểu 4 ký tự',
            'price.min' => 'Giá sản phẩm tối thiểu 4 ký tự',
            'price.numeric' => 'Giá sản phẩm phải là số',
        ];
    }
}
