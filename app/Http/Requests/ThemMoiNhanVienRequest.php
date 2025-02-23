<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemMoiNhanVienRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "ma_nhan_vien"     =>   "required|min:7",
            "ho_va_ten"        =>   "required|min:4",
            "ngay_sinh"        =>   "required|date",
            "luong_co_ban"     =>   "required|numeric|min:3000000",
            "id_chuc_vu"       =>   "required|exists:phan_quyens,id",
            "ngay_bat_dau"     =>   "required|date",
            "so_dien_thoai"    =>   "required|digits:10",
            "password"         =>   "required|min:8|max:30",
            "re_password"      =>   "required|same:password",
            "tinh_trang"       =>   "required|boolean",
            "avatar"           =>   "required",
            "email"            =>   "required|email|unique:nhan_viens,email",
        ];
    }

    public function messages()
    {
        return [
            "ma_nhan_vien.*"     =>   "Mã nhân viên tối thiểu phải 7 ký tự", //Phải nhập, tối thiểu phải 7 ký tự
            "ho_va_ten.*"        =>   "Họ và tên tổi thiểu phải 4 ký tự", //Phải nhập, tổi thiểu phải 4 ký tự
            "ngay_sinh.*"        =>   "Ngày sinh kiểu dữ liệu là ngày",  //Phải nhập, kiểu dữ liệu là ngày
            "luong_co_ban.*"     =>   "Lương tối thiểu là 3 triệu", // Phải nhập, lương tối thiểu là 3 triệu
            "id_chuc_vu.*"       =>   "Chức vụ phải tồn tại ở quản lý chức vụ", // Phải nhập, dữ liệu ở table phan_quyens CỘT id
            "ngay_bat_dau.*"     =>   "Ngày bắt đầu kiểu dữ liệu là ngày",
            "so_dien_thoai.*"    =>   "Số điện thoại phải có 10 số",
            "password.*"         =>   "Mật khẩu phải từ 8 đến 30 ký tự",
            "re_password.*"      =>   "Nhập lại mật khẩu phải giống mật khẩu",
            "tinh_trang.*"       =>   "Tình trạng chỉ được chọn trong giao diện",
            "avatar.*"           =>   "Phải nhập ảnh đại diện",
            "email.*"            =>   "Phải nhập email và không được trùng",
        ];
    }
}
