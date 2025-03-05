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
            ['link_hinh_anh'=>'https://images.pexels.com/photos/260922/pexels-photo-260922.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'tinh_trang'=>'1'],
            ['link_hinh_anh'=>'https://images.pexels.com/photos/949406/pexels-photo-949406.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', 'tinh_trang'=>'1'],
        ]);
    }
}
