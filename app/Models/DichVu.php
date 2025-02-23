<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DichVu extends Model
{
    use HasFactory;

    protected $table = "dich_vus";

    protected $fillable = [
        'ten_dich_vu',
        'don_gia',
        'don_vi_tinh',
        'ghi_chu',
        'tinh_trang',
    ];
}
