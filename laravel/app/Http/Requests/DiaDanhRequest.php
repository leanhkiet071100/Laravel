<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaDanhRequest extends FormRequest
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
            'TenDiaDanh' => 'required|min:3|max:100|unique:diadanhs,Ten_Ddanh',
            'DiaChi' => 'required|min:3|max:100',
            //'TenGoiKhac' => 'required',
            'CanhVat' => 'required|min:3|max:100',
            'KhiHau' => 'required',
            'TaiNguyen' => 'required',
            'NhuCau' => 'required',
            'KinhDo' => 'required|numeric',
            'ViDo' => 'required',
            //'Hinh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
        ];
    }

    public function messages()
    {
        return [
                'required' => ':attribute không được để trống',
                'min' => ':attribute không được nhỏ hơn :min',
                'max' => ':attribute không được lớn hơn :max',
                'numeric' => ':attribute phải là số',
                'NhuCau.required' => "Vui lòng chọn lựa nhu cầu",
                'unique' => ':attribute đã tồn tại',
                //'Hinh.mimes' => 'Hình ảnh phải có định dạng jpeg,png,jpg,gif,svg',
        ];
    }

    public function attributes(){
        return [
            'TenDiaDanh' => 'Tên địa danh',
            'DiaChi' => 'Địa chỉ',
            'TenGoiKhac' => 'Tên gọi khác',
            'CanhVat' => 'Cảnh vật',
            'KhiHau' => 'Khí hậu',
            'TaiNguyen' => 'Tài nguyên',
            'NhuCau' => 'Nhu cầU',
            'KinhDo' => 'Kinh độ',
            'viDo' => 'Vĩ độ',
            //'Hinh' => 'Hình ảnh',
        ];
    }
}
