<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChinhSuaDacDiemRequest extends FormRequest
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
            'hoa' =>'required',
            'la' =>'required',
            'than' =>'required',
            're' => 'required',  
            'thoigianno'=>'required',
            'nhiet_do'=>'required',
            'do_am'=>'required',
            'anh_sang'=>'required',
            'van_de_sau_benh'=>'required',            
        ];

    }
    public function messages()
    {
        return [
            
            
            "hoa.required" => "Hoa không được để trống, vui lòng kiểm tra lại!",
            "la.required" => "Lá không được để trống, vui lòng kiểm tra lại!",
            "than.required" => "Thân không được để trống, vui lòng kiểm tra lại!",
            "re.required" => "Rễ không được để trống, vui lòng kiểm tra lại!",
            "thoigianno.required" => "Thời gian nở không được để trống, vui lòng kiểm tra lại!",
            "nhiet_do.required" => "Đặc điểm sinh trưởng không được để trống, vui lòng kiểm tra lại!",
            "do_am.required" => "Đặc điểm sinh trưởng không được để trống, vui lòng kiểm tra lại!",
            "anh_sang.required" => "Đặc điểm sinh trưởng không được để trống, vui lòng kiểm tra lại!",
            "van_de_sau_benh.required" => "Đặc điểm sinh trưởng không được để trống, vui lòng kiểm tra lại!",
        ];
    }
}
