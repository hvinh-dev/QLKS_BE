<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createPhongRequest extends FormRequest
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
            'ten_phong'        => 'required|min:3',
            'gia_mac_dinh'             => 'required|numeric|min:0',
            'id_loai_phong'          => 'required|exists:loai_phongs,id',
            'tinh_trang'            => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'ten_phong.*'        => 'Tên Phòng Phải Từ 3 Ký Tự',
            'gia_mac_dinh.*'             => 'Giá mặc định không được để trống',
            'id_loai_phong.*'          => 'Loại Phòng không được để trống',
            'tinh_trang.*'            => 'Tình trạng không được để trống',
        ];
    }
}
