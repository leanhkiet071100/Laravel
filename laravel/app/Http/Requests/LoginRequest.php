<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'TaiKhoan' => 'required',
            'MatKhau' => 'required',
        ];
        
    }
    
      public function messages()
    {
        return [
                'required' => ':attribute không được để trống',
                     
        ];
    }

      public function attributes(){
        return [
            'TaiKhoan' => 'Tên tài khoản',
            'MatKhau' => 'Mật khẩu',
        ];
    }
}
