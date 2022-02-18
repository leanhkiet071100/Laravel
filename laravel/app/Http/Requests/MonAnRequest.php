<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonAnRequest extends FormRequest
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
            //'TenMon' => 'required|unique:monans,Ten_Mon ',
            'TenMon' => 'required',
            'GiaMon' => 'required|integer',
            'Hinh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
   
        ];
        
    }
    
      public function messages()
    {
        return [
          
                'required' => ':attribute không được để trống',
                'unique' => ':attribute đã tồn tại',
                'max' => ':attribute không được lớn hơn :max',
                'image' => ':attribute không đúng định dạng',
                'mimes' => ':attribute không đúng định dạng',
        ];
    }

      public function attributes(){
        return [
            'TenMon' => 'Tên món ăn',
            'GiaMon' => 'Giá bán',
            'Hinh' => 'Hình ảnh',
        ];
    }

}
