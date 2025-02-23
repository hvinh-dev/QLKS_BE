<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createReviewRequest extends FormRequest
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
            'avatar'        => 'required',
            'ho_va_ten'             => 'required',
            'noi_dung'          => 'required',
            'sao_danh_gia'            => 'required|numeric|min:1|max:5',
        ];
    }

    public function messages()
    {
        return [
            'avatar.*'        => 'Avatar không được để trống',
            'ho_va_ten.*'             => 'Họ và tên không được để trống',
            'noi_dung.*'          => 'Nội dung không được để trống',
            'sao_danh_gia.*'            => 'Sao đánh giá phải từ 1 đến 5',
        ];
    }
}
