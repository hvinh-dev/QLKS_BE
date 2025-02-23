<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createBaiVietRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ten_bai_viet'        => 'required|min:3',
            'mo_ta_ngan'          => 'required',
            'mo_ta_chi_tiet'      => 'required',
            'hinh_anh'            => 'required',
            'tinh_trang'          => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'ten_bai_viet.*'        => 'Tên bài viết Phải Từ 3 Ký Tự',
            'mo_ta_ngan.*'             => 'Mô tả ngắn không được để trống',
            'mo_ta_chi_tiet.*'          => 'Mô tả chi tiết không được để trống',
            'hinh_anh.*'            => 'Hình ảnh không được để trống',
            'tinh_trang.*'            => 'Tình trạng không được để trống',
        ];
    }
}
