<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createDichVuRequest extends FormRequest
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
            'ten_dich_vu'        => 'required|min:5',
            'don_gia'             => 'required|numeric|min:0',
            'don_vi_tinh'          => 'required',
            'ghi_chu'             => 'required',
            'tinh_trang'            => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'ten_dich_vu.*'        => 'Tên Dịch Vụ Phải Từ 5 Ký Tự',
            'don_gia.*'             => 'Đơn giá không được để trống',
            'don_vi_tinh.*'          => 'Đơn vị tính không được để trống',
            'ghi_chu.*'             => 'Ghi chú không được để trống',
            'tinh_trang.*'            => 'Tình trạng không được để trống',
        ];
    }
}
