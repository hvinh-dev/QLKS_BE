<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietThuePhong extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_thue_phongs';

    protected $fillable = [
        'id_phong',
        'gia_thue',
        'tinh_trang',
        'ngay_thue',
        'id_hoa_don',
        'ghi_chu',
    ];

    CONST PHONG_DANG_SUA  = 0;
    CONST PHONG_TRONG     = 1;
    CONST PHONG_DANG_COC  = 2;
    CONST PHONG_CO_NGUOI  = 3;
}
