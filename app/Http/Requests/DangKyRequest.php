<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKyRequest extends FormRequest
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
            'ho_lot'         =>   'required',
            'ten'            =>   'required',
            'email'          =>   'required|email|unique:khach_hangs,email',
            'so_dien_thoai'  =>   'required|digits:10',
            'password'       =>   'required|min:5',
            're_password'    => 'required|same:password',
            'ngay_sinh'      => 'required|date|before:today',
        ];
    }
    public function messages()
    {
        return [
            'ho_lot.*'         =>  'Họ lót không được để trống',
            'ten.*'            =>  'Tên không được để trống',
            'email.required'   =>  'Email không không được để trống',
            'email.unique'     =>  'Email đã tồn tại',
            'email.email'      =>   'Email không đúng định dạng',
            'so_dien_thoai.*'  =>  'Số điện thoai không được để trống và đủ 10 số',
            'password.*'       =>  'Mật khẩu không đươc để trống',
            're_password.required'    =>  'Mật khẩu không đươc để trống',
            're_password.same' =>  'Mật khẩu không trùng khớp',
            'ngay_sinh.*'      =>  'ngày sinh không được để trống và là nhỏ hơn ngày hiện tại',
        ];
    }
}
