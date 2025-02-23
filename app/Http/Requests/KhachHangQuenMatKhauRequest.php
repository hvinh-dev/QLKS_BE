<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhachHangQuenMatKhauRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'     =>  'required|exists:khach_hangs,email'
        ];
    }

    public function messages()
    {
        return [
            'email.*'     =>  'Email không tồn tại trong hệ thống!'
        ];
    }
}
