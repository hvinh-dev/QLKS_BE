<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucNangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chuc_nangs')->delete();

        DB::table('chuc_nangs')->truncate();

        DB::table('chuc_nangs')->insert([
            ["id" => 1, "ten_chuc_nang" => "Xem Thông Tin Loại Phòng"],
            ["id" => 2, "ten_chuc_nang" => "Tạo Mới Loại Phòng"],
            ["id" => 3, "ten_chuc_nang" => "Tìm Kiếm Loại Phòng"],
            ["id" => 4, "ten_chuc_nang" => "Xoá Loại Phòng"],
            ["id" => 5, "ten_chuc_nang" => "Cập Nhật Loại Phòng"],
            ["id" => 6, "ten_chuc_nang" => "Thay Đổi Trạng Thái Loại Phòng"],
            ["id" => 7, "ten_chuc_nang" => "Xem Thông Tin Dịch Vụ"],
            ["id" => 8, "ten_chuc_nang" => "Tạo Mới Dịch Vụ"],
            ["id" => 9, "ten_chuc_nang" => "Xoá Dịch Vụ"],
            ["id" => 10, "ten_chuc_nang" => "Cập Nhật Dịch Vụ"],
            ["id" => 11, "ten_chuc_nang" => "Đổi Trạng Thái Dịch Vụ"],
            ["id" => 12, "ten_chuc_nang" => "Tìm Kiếm Dịch Vụ"],
            ['id' => 13, 'ten_chuc_nang' => 'Xem Thông Tin Phòng'],
            ['id' => 14, 'ten_chuc_nang' => 'Tạo Mới Phòng'],
            ['id' => 15, 'ten_chuc_nang' => 'Xóa Phòng'],
            ['id' => 16, 'ten_chuc_nang' => 'Cập Nhật Phòng'],
            ['id' => 17, 'ten_chuc_nang' => 'Thay Đổi Trạng Thái Phòng'],
            ['id' => 18, 'ten_chuc_nang' => 'Tìm Kiếm Phòng'],
            ['id' => 19, 'ten_chuc_nang' => 'Xem Thông Tin Nhân Viên'],
            ['id' => 20, 'ten_chuc_nang' => 'Tạo Mới Nhân Viên'],
            ['id' => 21, 'ten_chuc_nang' => 'Xóa Nhân Viên'],
            ['id' => 22, 'ten_chuc_nang' => 'Cập Nhật Nhân Viên'],
            ['id' => 23, 'ten_chuc_nang' => 'Thay Đổi Trạng Thái Nhân Viên'],
            ['id' => 24, 'ten_chuc_nang' => 'Tìm Kiếm Nhân Viên'],
            ['id' => 25, 'ten_chuc_nang' => 'Xem Thông Tin Slide'],
            ['id' => 26, 'ten_chuc_nang' => 'Tạo Mới Slide'],
            ['id' => 27, 'ten_chuc_nang' => 'Xóa Slide'],
            ['id' => 28, 'ten_chuc_nang' => 'Cập Nhật Slide'],
            ['id' => 29, 'ten_chuc_nang' => 'Thay Đổi Trạng Thái Slide'],
            ['id' => 30, 'ten_chuc_nang' => 'Tìm Kiếm Slide'],
            ['id' => 31, 'ten_chuc_nang' => 'Xem Thông Tin Review'],
            ['id' => 32, 'ten_chuc_nang' => 'Tạo Mới Review'],
            ['id' => 33, 'ten_chuc_nang' => 'Xóa Review'],
            ['id' => 34, 'ten_chuc_nang' => 'Cập Nhật Review'],
            ['id' => 35, 'ten_chuc_nang' => 'Tìm Kiếm Review'],
            ['id' => 36, 'ten_chuc_nang' => 'Xem Thông Tin Phân Quyền'],
            ['id' => 37, 'ten_chuc_nang' => 'Tạo Mới Phân Quyền'],
            ['id' => 38, 'ten_chuc_nang' => 'Xóa Phân Quyền'],
            ['id' => 39, 'ten_chuc_nang' => 'Cập Nhật Phân Quyền'],
            ['id' => 40, 'ten_chuc_nang' => 'Tìm Kiếm Phân Quyền'],
            ['id' => 41, 'ten_chuc_nang' => 'Lấy Thông Tin Chức Năng'],
            ['id' => 42, 'ten_chuc_nang' => 'Tạo Mới Chi Tiết Thuê Phòng'],
            ['id' => 43, 'ten_chuc_nang' => 'Lấy Thông Tin Chi Tiết Thuê Phòng'],
            ['id' => 44, 'ten_chuc_nang' => 'Cập Nhật Chi Tiết Thuê Phòng'],
            ['id' => 45, 'ten_chuc_nang' => 'Tìm Kiếm Chi Tiết Thuê Phòng'],
            ['id' => 46, 'ten_chuc_nang' => 'Xem Thông Tin Thống Kê Thuê Phòng'],
            ['id' => 47, 'ten_chuc_nang' => 'Tìm Kiếm Thống Kê Thuê Phòng'],
            ['id' => 48, 'ten_chuc_nang' => 'Lấy Thông Tin Bài Viết'],
            ['id' => 49, 'ten_chuc_nang' => 'Tạo Mới Bài Viết'],
            ['id' => 50, 'ten_chuc_nang' => 'Xóa Bài Viết'],
            ['id' => 51, 'ten_chuc_nang' => 'Cập Nhật Bài Viết'],
            ['id' => 52, 'ten_chuc_nang' => 'Đổi Trạng Thái Bài Viết'],
            ['id' => 53, 'ten_chuc_nang' => 'Tìm Kiếm Bài Viết'],
            ['id' => 54, 'ten_chuc_nang' => 'Xem Thông Tin Khách Hàng'],
            ['id' => 55, 'ten_chuc_nang' => 'Đổi Trạng Thái Khách Hàng'],
            ['id' => 56, 'ten_chuc_nang' => 'Xóa Khách Hàng'],
            ['id' => 57, 'ten_chuc_nang' => 'Cập Nhật Khách Hàng'],
            ['id' => 58, 'ten_chuc_nang' => 'Tìm Kiếm Khách Hàng'],
            ['id' => 59, 'ten_chuc_nang' => 'Lấy Thông Tin Hóa Đơn'],
            ['id' => 60, 'ten_chuc_nang' => 'Lấy Thông Tin Hóa Đơn Chi Tiết Thuê'],
            ['id' => 61, 'ten_chuc_nang' => 'Xác Nhận Đơn Hàng'],
            ['id' => 62, 'ten_chuc_nang' => 'Tìm Kiếm Hóa Đơn'],
            ['id' => 63, 'ten_chuc_nang' => 'Thống Kê Doanh Thu'],
            ['id' => 64, 'ten_chuc_nang' => 'Thống Kê Số Lượng Phòng Của Loại Phòng'],
            ['id' => 65, 'ten_chuc_nang' => 'Thống Kê Tổng Tiền Của Khách Hàng'],
            ['id' => 66, 'ten_chuc_nang' => 'Thống Kê Số Lượng Thuê Của Khách Hàng'],
            ['id' => 67, 'ten_chuc_nang' => 'Tạo Mới Chức Năng Cho Quyền'],
            ['id' => 68, 'ten_chuc_nang' => 'Xem Thông Tin Chi Tiết Phân Quyền'],
            ['id' => 69, 'ten_chuc_nang' => 'Xem Thông Tin Chuyên Mục'],
            ['id' => 70, 'ten_chuc_nang' => 'Tạo Mới Chuyên Mục'],
            ['id' => 71, 'ten_chuc_nang' => 'Xóa Chuyên Mục'],
            ['id' => 72, 'ten_chuc_nang' => 'Cập Nhật Chuyên Mục'],
            ['id' => 73, 'ten_chuc_nang' => 'Đổi trạng thái Chuyên Mục'],
            ['id' => 74, 'ten_chuc_nang' => 'Tìm Kiếm Chuyên Mục'],
        ]);
    }
}
