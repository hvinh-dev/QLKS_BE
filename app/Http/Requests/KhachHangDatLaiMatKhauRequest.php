<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhachHangDatLaiMatKhauRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'hash_reset'    =>  'required|exists:khach_hangs,hash_reset',
            'password'      =>  'required|min:6|max:30',
            're_password'   =>  'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'hash_reset.required'    =>  'Mã bí mật yêu cầu phải nhập!',
            'hash_reset.exists'      =>  'Mã bí mật không tồn tại trong hệ thống!',
            'password.*'            =>  'Mật khẩu phải từ 6 đến 30 ký tự!',
            're_password.*'         =>  'Mật khẩu nhập lại phải giống nhau!'
        ];
    }
}
