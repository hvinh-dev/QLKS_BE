<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;

    protected $table = 'hoa_dons';

    protected $fillable = [
        'ma_hoa_don',
        'id_khach_hang',
        'tong_tien',
        'is_thanh_toan',
        'ngay_den',
        'ngay_di'
    ];
}
