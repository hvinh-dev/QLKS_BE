<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createLoaiPhongRequest extends FormRequest
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
            'ten_loai_phong'        => 'required|min:5',
            'so_giuong'             => 'required|numeric|min:1',
            'so_nguoi_lon'          => 'required|numeric|min:1',
            'so_tre_em'             => 'required|numeric|min:0',
            'dien_tich'             => 'required|numeric|min:10',
            'hinh_anh'              => 'required',
            'tien_ich'              => 'required',
            'tinh_trang'            => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'ten_loai_phong.*'        => 'Tên Loại Phòng Phải Từ 5 Ký Tự',
            'so_giuong.*'             => 'Phải từ 1 giường trở lên',
            'so_nguoi_lon.*'          => 'Phải từ một người lớn trở lên',
            'so_tre_em.*'             => 'Trẻ em không được để trống',
            'dien_tich.*'             => 'Diện tích phải từ 10m vuông',
            'hinh_anh.*'              => 'Hình ảnh không được để trống',
            'tien_ich.*'              => 'Tiện ích không được để trống',
            'tinh_trang.*'            => 'Tình trạng không được để trống',
        ];
    }
}
