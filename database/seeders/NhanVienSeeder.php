<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nhan_viens')->delete();
        DB::table('nhan_viens')->truncate();
        DB::table('nhan_viens')->insert([
            [
                'ma_nhan_vien'      =>  'VB01',
                'ho_va_ten'         =>  'Trần Ngô Hồng Vinh',
                'ngay_sinh'         =>  '2003-08-16',
                'luong_co_ban'      =>  '10000000',
                'id_chuc_vu'        =>  '1',
                'ngay_bat_dau'      => '2024-01-01',
                'so_dien_thoai'     =>  '0905.523.543',
                'email'             =>  'hvinh.job@gmail.com',
                'password'          =>  bcrypt('123456'),
                'tinh_trang'        =>  1,
                'avatar'            =>  'https://cdn-icons-png.flaticon.com/512/9703/9703596.png',
            ],
            [
                'ma_nhan_vien'      =>  'VB02',
                'ho_va_ten'         =>  'Trương Khắc Bắc',
                'ngay_sinh'         =>  '2003-01-01',
                'luong_co_ban'      =>  '10000000',
                'id_chuc_vu'        =>  '1',
                'ngay_bat_dau'      => '2024-01-01',
                'so_dien_thoai'     =>  '0905.523.543',
                'email'             =>  'khacbac@gmail.com',
                'password'          =>  bcrypt('123456'),
                'tinh_trang'        =>  1,
                'avatar'            =>  'https://cdn-icons-png.flaticon.com/512/9703/9703596.png',
            ],
        ]);
    }
}
