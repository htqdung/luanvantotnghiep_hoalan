<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemDanhSachSanPhamRequest extends FormRequest
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
            'ten_san_pham' => 'required',
            'themloai' => 'required',
            'gia' => 'required',
            'diem_thuong' => 'required',
            'ten_tags' => 'required',
            'ten_hinh' => 'required',
            'mo_ta' => 'required',
            'kich_thuoc' => 'required',
        ];

    }
    public function messages()
    {
        return [
            
            "ten_san_pham.required" => "Vui lòng nhập tên sản phẩm, vui lòng kiểm tra lại!",
            "themloai.required" => "Vui lòng chọn ít nhất một loài hoa, vui lòng kiểm tra lại!",
            "gia.required" => " Giá không được để trống, vui lòng kiểm tra lại! ",
            // "gia.digits_between" = "Giá phải là số, vui lòng kiểm tra lại! ",
            // 'gia.max' = "Số của Giá nhập quá lớn, vui lòng kiểm tra lại! ",
            "diem_thuong.required" => "Vui lòng nhập điểm thưởng, vui lòng kiểm tra lại! ",
            // "diem_thuong.min" => "Điểm thưởng phải là số lớn hơn 0, vui lòng kiểm tra lại! ",
            // "diem_thuong.max" => "Số quá lớn vui lòng kiểm tra lại, vui lòng kiểm tra lại! ",
            "ten_tags.required" => "Vui lòng nhập tags, vui lòng kiểm tra lại! ",
            "ten_hinh.required" => "Vui lòng chọn ảnh, vui lòng kiểm tra lại! ",
            "mo_ta.required" => "Vui lòng nhập mô tả, vui lòng kiểm tra lại! ",
            "kich_thuoc.required" =>"Vui lòng nhập kích thước của sản phẩm, vui lòng kiểm tra lại!",
        ];
    }
}
