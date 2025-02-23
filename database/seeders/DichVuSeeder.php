<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DichVuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dich_vus')->delete();
        DB::table('dich_vus')->insert([
            ['id' => '1' ,'ten_dich_vu' => 'Dịch vụ lễ tân 24/7', 'don_gia' => '0', 'don_vi_tinh' => 'Dịch Vụ', 'ghi_chu' => 'Phục vụ mọi yêu cầu 24/7', 'tinh_trang' => '1'],
            ['id' => '2' ,'ten_dich_vu' => 'Dọn phòng hàng ngày', 'don_gia' => '0', 'don_vi_tinh' => 'Dịch Vụ', 'ghi_chu' => 'Dọn dẹp và sắp xếp phòng hàng ngày', 'tinh_trang' => '1'],
            ['id' => '3' ,'ten_dich_vu' => 'Room service', 'don_gia' => '235000 ', 'don_vi_tinh' => 'Dịch Vụ', 'ghi_chu' => 'Phục vụ món ăn tận phòng', 'tinh_trang' => '1'],
            ['id' => '4' ,'ten_dich_vu' => 'Nhà hàng', 'don_gia' => ' 2350000 ', 'don_vi_tinh' => 'Người', 'ghi_chu' => 'Dịch vụ ăn uống tại nhà hàng khách sạn', 'tinh_trang' => '1'],
            ['id' => '5' ,'ten_dich_vu' => 'Buffet sáng', 'don_gia' => ' 705000 ', 'don_vi_tinh' => 'Người', 'ghi_chu' => 'Bữa sáng buffet hoặc theo yêu cầu', 'tinh_trang' => '1'],
            ['id' => '6' ,'ten_dich_vu' => 'WiFi', 'don_gia' => '352500 ', 'don_vi_tinh' => 'Ngày', 'ghi_chu' => 'Kết nối internet không dây', 'tinh_trang' => '1'],
            ['id' => '7' ,'ten_dich_vu' => 'Trung tâm thể dục', 'don_gia' => '2350000  ', 'don_vi_tinh' => 'Giờ', 'ghi_chu' => 'Có thiết bị gym và có thể có huấn luyện viên', 'tinh_trang' => '1'],
            ['id' => '8' ,'ten_dich_vu' => 'Spa và wellness', 'don_gia' => '4700000 ', 'don_vi_tinh' => 'Liệu pháp', 'ghi_chu' => 'Các liệu pháp thư giãn và chăm sóc sức khỏe', 'tinh_trang' => '1'],
            ['id' => '9' ,'ten_dich_vu' => 'Dịch vụ đưa đón', 'don_gia' => '2350000', 'don_vi_tinh' => 'Chuyến', 'ghi_chu' => 'Đưa đón tới các điểm cần thiết', 'tinh_trang' => '1'],
            ['id' => '10' ,'ten_dich_vu' => 'Hội họp và sự kiện', 'don_gia' => '17000000 ', 'don_vi_tinh' => 'Sự kiện', 'ghi_chu' => 'Cho thuê phòng hội họp, tổ chức sự kiện', 'tinh_trang' => '1'],
        ]);
    }
}
