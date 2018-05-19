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
            'ten_khoa_hoc_chi' => 'required',
            'chi_hoa' => 'required',
            'chi_than' => 'required', 
            'chi_re' => 'required',
            'chi_canh' => 'required',
            'chi_la' => 'required',            
        ];

    }
    public function messages()
    {
        return [
            
            "ten_chi.required" => "Tên chi không được để trống, vui lòng kiểm tra lại!",
            "ten_chi.unique" => "Tên chi đã tồn tại, vui lòng kiểm tra lại!",
            "ten_khoa_hoc_chi.required" => "Tên khoa học không được để trống, vui lòng kiểm tra lại!",
            "chi_hoa.required" => "Hoa không được để trống, vui lòng kiểm tra lại!",
            "chi_re.required" => "Rễ không được để trống, vui lòng kiểm tra lại!",
            "chi_than.required" => "Thâna không được để trống, vui lòng kiểm tra lại!",
            "chi_canh.required" => "Cành không được để trống, vui lòng kiểm tra lại!",
            "chi_la.required" => "Lá không được để trống, vui lòng kiểm tra lại!",

        ];
    }
}
