<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    use HasFactory;

    protected $table = 'phongs';

    protected $fillable = [
        'ten_phong',
        'gia_mac_dinh',
        'tinh_trang',
        'id_loai_phong',
        'tien_ich_khac',
    ];
}
