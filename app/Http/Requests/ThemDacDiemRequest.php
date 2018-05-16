<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemDacDiemRequest extends FormRequest
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
            'hoa'=>'required',
            'la'=>'required',
            'than'=>'required',
            're'=>'required',
            'nhiet_do' => 'required',
            'do_am' => 'required',
            'anh_sang' => 'required',
            'van_de_sau_benh' => 'required',
        ];

    }
    public function messages()
    {
        return [
            "nhiet_do.required" => "Nhiệt độ không được để trống, vui lòng kiểm tra lại!",
            "do_am.required" => "Độ ẩm không được để trống, vui lòng kiểm tra lại!",
            "anh_sang.required" => "Ánh sáng không được để trống, vui lòng kiểm tra lại!",
            "van_de_sau_benh.required" => "Vấn đề sâu bệnh không được để trống, vui lòng kiểm tra lại!",
            "hoa.required" => "Hoa không được để trống, vui lòng kiểm tra lại!",
            "la.required" => "Lá không được để trống, vui lòng kiểm tra lại!",
            "than.required" => "Thân không được để trống, vui lòng kiểm tra lại!",
            "re.required" => "Rể không được để trống, vui lòng kiểm tra lại!",
        ];
    }
}
