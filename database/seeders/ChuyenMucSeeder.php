<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChuyenMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chuyen_mucs')->delete();

        DB::table('chuyen_mucs')->truncate();

        DB::table('chuyen_mucs')->insert([
            ['id' => 1, 'ten_chuyen_muc' => 'Ẩm Thực', 'slug_chuyen_muc' => 'am-thuc', 'tinh_trang' => 1],
            ['id' => 2, 'ten_chuyen_muc' => 'Điểm Đến', 'slug_chuyen_muc' => 'diem-den', 'tinh_trang' => 1],
            ['id' => 3, 'ten_chuyen_muc' => 'Cẩm Nang', 'slug_chuyen_muc' => 'cam-nang', 'tinh_trang' => 1],
        ]);
    }
}
