<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiPhong extends Model
{
    use HasFactory;

    protected $table = 'loai_phongs';

    protected $fillable = [
        'ten_loai_phong',
        'so_giuong',
        'so_nguoi_lon',
        'so_tre_em',
        'dien_tich',
        'hinh_anh',
        'tien_ich',
        'tinh_trang'
    ];
}
