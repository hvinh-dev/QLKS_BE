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
                'ma_nhan_vien'      =>  'DZ01',
                'ho_va_ten'         =>  'Nguyễn Quốc Long',
                'ngay_sinh'         =>  '2000-01-01',
                'luong_co_ban'      =>  '10000000',
                'id_chuc_vu'        =>  '1',
                'ngay_bat_dau'      => '2024-01-01',
                'so_dien_thoai'     =>  '0905.523.543',
                'email'             =>  'quoclongdng@gmail.com',
                'password'          =>  bcrypt('123456'),
                'tinh_trang'        =>  1,
                'avatar'            =>  'https://scs.duytan.edu.vn/upload/images/13-1-2021-7-24-29-57.JPG',
            ],
            [
                'ma_nhan_vien'      =>  'DZ01',
                'ho_va_ten'         =>  'Nguyễn Quốc Fake',
                'ngay_sinh'         =>  '2000-01-01',
                'luong_co_ban'      =>  '10000000',
                'id_chuc_vu'        =>  '1',
                'ngay_bat_dau'      => '2024-01-01',
                'so_dien_thoai'     =>  '0905.523.543',
                'email'             =>  'quoclongfake@gmail.com',
                'password'          =>  bcrypt('123456'),
                'tinh_trang'        =>  1,
                'avatar'            =>  'https://scs.duytan.edu.vn/upload/images/13-1-2021-7-24-29-57.JPG',
            ],
            [
                'ma_nhan_vien'      =>  'DZ01',
                'ho_va_ten'         =>  'Nguyễn Fake',
                'ngay_sinh'         =>  '2000-01-01',
                'luong_co_ban'      =>  '10000000',
                'id_chuc_vu'        =>  '1',
                'ngay_bat_dau'      => '2024-01-01',
                'so_dien_thoai'     =>  '0905.523.543',
                'email'             =>  'quocfake@gmail.com',
                'password'          =>  bcrypt('123456'),
                'tinh_trang'        =>  1,
                'avatar'            =>  'https://scs.duytan.edu.vn/upload/images/13-1-2021-7-24-29-57.JPG',
            ],
        ]);
    }
}
