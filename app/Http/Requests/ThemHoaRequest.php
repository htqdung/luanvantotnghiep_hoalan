<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemHoaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_chi' => 'required',
            'ten_loai' => 'required',
            'ten_khoa_hoc' => 'required',
            'dacdiem_id' => 'required',
            'mo_ta' => 'required'
             
        ];

    }
    public function messages()
    {
        return [
            
            "id_chi.required" => "Vui lòng chọn chi, vui lòng kiểm tra lại!",
            "ten_loai.required" => "Vui lòng nhập tên loài hoa.",
            "ten_loai.unique" => "Loài hoa này đã tồn tại vui lòng kiểm tra lại!",
            "ten_khoa_hoc.required" => "Vui lòng nhập tên khoa học.",
            "dacdiem_id.required" => "Vui lòng nhập đặc điểm.",
            "mo_ta.required" => "Vui lòng nhập mô tả loài hoa.",

        ];
    }
}
