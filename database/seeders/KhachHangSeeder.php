<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('khach_hangs')->delete();
        DB::table('khach_hangs')->truncate();
        DB::table('khach_hangs')->insert([
            [
                'ho_lot'        =>  'Nguyễn Quốc',
                'ten'           =>  'Long',
                'email'         =>  'quoclongdng@gmail.com',
                'so_dien_thoai' =>  '0708585120',
                'password'      =>  bcrypt('123456'),
                'ngay_sinh'     =>  '2005-01-01',
                'is_active'     => 1
            ],
            [
                'ho_lot'        => 'Nguyễn Văn',
                'ten'           => 'A',
                'email'         => 'nguyenvana@gmail.com',
                'so_dien_thoai' => '0708585121',
                'password'      => bcrypt('123456'),
                'ngay_sinh'     => '1980-02-15',
                'is_active'     => 1
            ],
            [
                'ho_lot'        => 'Trần Bình',
                'ten'           => 'B',
                'email'         => 'tranbinhb@gmail.com',
                'so_dien_thoai' => '0708585122',
                'password'      => bcrypt('123456'),
                'ngay_sinh'     => '1990-03-20',
                'is_active'     => 1
            ],
            [
                'ho_lot'        => 'Lê Thị',
                'ten'           => 'C',
                'email'         => 'lethic@gmail.com',
                'so_dien_thoai' => '0708585123',
                'password'      => bcrypt('123456'),
                'ngay_sinh'     => '1985-04-10',
                'is_active'     => 1
            ],
            // [
            //     'ho_lot'        => 'Phạm Hoàng',
            //     'ten'           => 'D',
            //     'email'         => 'phamhoangd@gmail.com',
            //     'so_dien_thoai' => '0708585124',
            //     'password'      => bcrypt('123456'),
            //     'ngay_sinh'     => '1975-05-30',
            // ],
            // [
            //     'ho_lot'        => 'Trịnh Văn',
            //     'ten'           => 'E',
            //     'email'         => 'trinhvane@gmail.com',
            //     'so_dien_thoai' => '0708585125',
            //     'password'      => bcrypt('123456'),
            //     'ngay_sinh'     => '1995-06-25',
            // ],
        ]);
    }
}
