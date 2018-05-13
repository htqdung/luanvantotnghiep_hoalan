<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemChiRequest extends FormRequest
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
            'ten_chi' => 'required|unique:tbl_chi',
            'canh_hoa' => 'required',
            'dai_hoa' => 'required',
            'bong_hoa' => 'required',            
        ];

    }
    public function messages()
    {
        return [
            
            "ten_chi.required" => "Tên chi không được để trống, vui lòng kiểm tra lại!",
            "ten_chi.unique" => "Tên chi đã tồn tại, vui lòng kiểm tra lại!",
            "canh_hoa.required" => "Cánh hoa không được để trống, vui lòng kiểm tra lại!",
            "dai_hoa.required" => "Đài hoa không được để trống, vui lòng kiểm tra lại!",
            "bong_hoa.required" => "Bông hoa không được để trống, vui lòng kiểm tra lại!",

        ];
    }
}
