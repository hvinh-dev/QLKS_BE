<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChuyenMucRequest extends FormRequest
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
            'ten_chuyen_muc'    =>   'required|min:5',
            'slug_chuyen_muc'   =>   'required|min:5',
            'tinh_trang'        =>   'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'ten_chuyen_muc.*'  =>   'Tên Chuyên Mục phải nhiều hơn 5 ký tự',
            'slug_chuyen_muc.*' =>   'slug Chuyên Mục phải nhiều hơn 5 ký tự',
            'tinh_trang.*'      =>   'TÌnh Trạng khồn được để trống',
        ];
    }
}
