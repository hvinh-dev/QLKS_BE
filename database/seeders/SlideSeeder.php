<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('slides')->delete();
        DB::table('slides')->insert([
            ['link_hinh_anh'=>'https://temme.vn/wp-content/uploads/2022/10/Blue-Gold-Modern-Elegant-Hotel-Promotion-Facebook-Ad-1.jpeg', 'tinh_trang'=>'1'],
            ['link_hinh_anh'=>'https://brghospitality.vn/rex/wp-content/uploads/sites/6/2019/09/Rex_Banner_1920X704__Phong.jpg', 'tinh_trang'=>'1'],
            ['link_hinh_anh'=>'https://dulichbinhlieu.com.vn/wp-content/uploads/2017/11/banner-web-1.png', 'tinh_trang'=>'1'],
        ]);
    }
}
