<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemTagsRequest extends FormRequest
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
            'ten_tags' => 'required|max:30|unique:tbl_tags'

            
        ];

    }
    public function messages()
    {
        return [
            
             "ten_tags.required" => "Tên tags không được để trống, vui lòng kiểm tra lại!",
             "ten_tags.max" => "Nội dung tags quá dài",
             "ten_tags.unique" => "Tags này đã tồn tại, vui lòng kiểm tra lại!",
   
        ];
    }
}
