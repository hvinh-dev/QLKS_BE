<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createPhanQuyenRequest extends FormRequest
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
            'ten_quyen'             => 'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            'ten_quyen.*'        => 'Tên quyền Phải Từ 3 Ký Tự',
        ];
    }
}
