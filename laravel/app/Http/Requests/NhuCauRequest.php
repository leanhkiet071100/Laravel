<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhuCauRequest extends FormRequest
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
            'TenNhuCau' => 'required|max:100|unique:nhucaus,Tennhucau',
        ];
    }
     public function messages()
    {
        return [
                'required' => ':attribute không được để trống',
                'unique' => ':attribute đã tồn tại',
                'max' => ':attribute không được lớn hơn :max',           
        ];
    }

    public function attributes(){
        return [
            'TenNhuCau' => 'Tên nhu cầu',
        ];
    }

}
