<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    use HasFactory;
    protected $table = 'bai_viets';

    protected $fillable = [
        'ten_bai_viet',
        'mo_ta_ngan',
        'mo_ta_chi_tiet',
        'hinh_anh',
        'tinh_trang',
        'id_chuyen_muc',
    ];

}
