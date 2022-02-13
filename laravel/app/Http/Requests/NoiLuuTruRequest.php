<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoiLuuTruRequest extends FormRequest
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
            'TenNoiLuuTru' => 'required|max:100',
            'DiaChiNoiLuuTru' => 'required|max:100',
            'DiaDanh' => 'required',
            'Hinh' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'SDTNoiLuuTru' => 'required|numeric',
        ];
    }
     public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại',
            'max' => ':attribute không được lớn hơn :max',
            'image' => ':attribute không đúng định dạng',
            'numeric' => ':attribute phải là số',
        ];
    }

    public function attributes(){
        return [
            'TenNoiLuuTru' => 'Tên nơi lưu trú',
            'DiaChiNoiLuuTru' => 'Địa chỉ nơi lưu trú',
            'DiaDanh' => 'Địa danh',
            'Hinh' => 'Hình ảnh',
            'SDTNoiLuuTru' => 'Số điện thoại',
        ];
    }
}
