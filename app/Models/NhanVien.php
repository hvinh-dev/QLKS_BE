<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class NhanVien extends Authenticatable
{
    use HasFactory , Notifiable , HasApiTokens;

    protected $table = 'nhan_viens';

    protected $fillable = [
        'ma_nhan_vien',
        'ho_va_ten',
        'ngay_sinh',
        'luong_co_ban',
        'id_chuc_vu',
        'ngay_bat_dau',
        'so_dien_thoai',
        'email',
        'password',
        'tinh_trang',
        'avatar',
        'is_master',
    ];
}
