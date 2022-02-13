<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class QuanAnRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // cho phép tru cập vào request hay không
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // chứa các rules
    public function rules()
    {
        return [
            'tenquanan' => 'required|min:3|max:100',
            'hinh' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'diachiquanan' => 'required|min:3|max:100',
            'sdt' => 'required|min:5',
        ];
    }

    public function messages()
    {
        return [
             'required' => ':attribute không được để trống',
                'min' => ':attribute không được nhỏ hơn :min',
                'max' => ':attribute không được lớn hơn :max',
                'sdt.integer' => ':attribute phải là số',
                'image' => ':attribute không đúng định dạng',
                'mimes' => ':attribute không đúng định dạng',
        ];
    }

    public function attributes(){
        return [
            'tenquanan' => 'Tên quán ăn',
            'hinh' => 'Hình',
            'diachiquanan' => 'Địa chỉ quán ăn',
            'sdt' => 'Số điện thoại',
            'Id_Ddanh' => 'địa danh',
        ];
    }
}
