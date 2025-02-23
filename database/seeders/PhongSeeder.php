<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('phongs')->delete();

        DB::table('phongs')->insert([
            // Loại phòng 1 - Phòng Standard
            ['id' => '1', 'ten_phong' => 'Phòng 101', 'gia_mac_dinh' => 300, 'tinh_trang' => '1', 'id_loai_phong' => '1'],
            ['id' => '2', 'ten_phong' => 'Phòng 102', 'gia_mac_dinh' => 300, 'tinh_trang' => '1', 'id_loai_phong' => '1'],
            ['id' => '3', 'ten_phong' => 'Phòng 103', 'gia_mac_dinh' => 300, 'tinh_trang' => '1', 'id_loai_phong' => '1'],
            ['id' => '4', 'ten_phong' => 'Phòng 104', 'gia_mac_dinh' => 300, 'tinh_trang' => '1', 'id_loai_phong' => '1'],
            ['id' => '5', 'ten_phong' => 'Phòng 105', 'gia_mac_dinh' => 300, 'tinh_trang' => '1', 'id_loai_phong' => '1'],
            ['id' => '6', 'ten_phong' => 'Phòng 106', 'gia_mac_dinh' => 300, 'tinh_trang' => '1', 'id_loai_phong' => '1'],
            ['id' => '7', 'ten_phong' => 'Phòng 107', 'gia_mac_dinh' => 300, 'tinh_trang' => '1', 'id_loai_phong' => '1'],
            ['id' => '8', 'ten_phong' => 'Phòng 108', 'gia_mac_dinh' => 300, 'tinh_trang' => '1', 'id_loai_phong' => '1'],
            ['id' => '9', 'ten_phong' => 'Phòng 109', 'gia_mac_dinh' => 300, 'tinh_trang' => '1', 'id_loai_phong' => '1'],
            ['id' => '10', 'ten_phong' => 'Phòng 110', 'gia_mac_dinh' => 300, 'tinh_trang' => '1', 'id_loai_phong' => '1'],

            // Loại phòng 2 - Phòng Superior
            ['id' => '11', 'ten_phong' => 'Phòng 201', 'gia_mac_dinh' => 400, 'tinh_trang' => '1', 'id_loai_phong' => '2'],
            ['id' => '12', 'ten_phong' => 'Phòng 202', 'gia_mac_dinh' => 400, 'tinh_trang' => '1', 'id_loai_phong' => '2'],
            ['id' => '13', 'ten_phong' => 'Phòng 203', 'gia_mac_dinh' => 400, 'tinh_trang' => '1', 'id_loai_phong' => '2'],
            ['id' => '14', 'ten_phong' => 'Phòng 204', 'gia_mac_dinh' => 400, 'tinh_trang' => '1', 'id_loai_phong' => '2'],
            ['id' => '15', 'ten_phong' => 'Phòng 205', 'gia_mac_dinh' => 400, 'tinh_trang' => '1', 'id_loai_phong' => '2'],
            ['id' => '16', 'ten_phong' => 'Phòng 206', 'gia_mac_dinh' => 400, 'tinh_trang' => '1', 'id_loai_phong' => '2'],
            ['id' => '17', 'ten_phong' => 'Phòng 207', 'gia_mac_dinh' => 400, 'tinh_trang' => '1', 'id_loai_phong' => '2'],
            ['id' => '18', 'ten_phong' => 'Phòng 208', 'gia_mac_dinh' => 400, 'tinh_trang' => '1', 'id_loai_phong' => '2'],
            ['id' => '19', 'ten_phong' => 'Phòng 209', 'gia_mac_dinh' => 400, 'tinh_trang' => '1', 'id_loai_phong' => '2'],
            ['id' => '20', 'ten_phong' => 'Phòng 210', 'gia_mac_dinh' => 400, 'tinh_trang' => '1', 'id_loai_phong' => '2'],

            // Loại phòng 3 - Phòng Deluxe
            ['id' => '21', 'ten_phong' => 'Phòng 301', 'gia_mac_dinh' => 500, 'tinh_trang' => '1', 'id_loai_phong' => '3'],
            ['id' => '22', 'ten_phong' => 'Phòng 302', 'gia_mac_dinh' => 500, 'tinh_trang' => '1', 'id_loai_phong' => '3'],
            ['id' => '23', 'ten_phong' => 'Phòng 303', 'gia_mac_dinh' => 500, 'tinh_trang' => '1', 'id_loai_phong' => '3'],
            ['id' => '24', 'ten_phong' => 'Phòng 304', 'gia_mac_dinh' => 500, 'tinh_trang' => '1', 'id_loai_phong' => '3'],
            ['id' => '25', 'ten_phong' => 'Phòng 305', 'gia_mac_dinh' => 500, 'tinh_trang' => '1', 'id_loai_phong' => '3'],
            ['id' => '26', 'ten_phong' => 'Phòng 306', 'gia_mac_dinh' => 500, 'tinh_trang' => '1', 'id_loai_phong' => '3'],
            ['id' => '27', 'ten_phong' => 'Phòng 307', 'gia_mac_dinh' => 500, 'tinh_trang' => '1', 'id_loai_phong' => '3'],
            ['id' => '28', 'ten_phong' => 'Phòng 308', 'gia_mac_dinh' => 500, 'tinh_trang' => '1', 'id_loai_phong' => '3'],
            ['id' => '29', 'ten_phong' => 'Phòng 309', 'gia_mac_dinh' => 500, 'tinh_trang' => '1', 'id_loai_phong' => '3'],
            ['id' => '30', 'ten_phong' => 'Phòng 310', 'gia_mac_dinh' => 500, 'tinh_trang' => '1', 'id_loai_phong' => '3'],

            // Loại phòng 4 - Phòng Suite
            ['id' => '31', 'ten_phong' => 'Phòng 401', 'gia_mac_dinh' => 600, 'tinh_trang' => '1', 'id_loai_phong' => '4'],
            ['id' => '32', 'ten_phong' => 'Phòng 402', 'gia_mac_dinh' => 600, 'tinh_trang' => '1', 'id_loai_phong' => '4'],
            ['id' => '33', 'ten_phong' => 'Phòng 403', 'gia_mac_dinh' => 600, 'tinh_trang' => '1', 'id_loai_phong' => '4'],
            ['id' => '34', 'ten_phong' => 'Phòng 404', 'gia_mac_dinh' => 600, 'tinh_trang' => '1', 'id_loai_phong' => '4'],
            ['id' => '35', 'ten_phong' => 'Phòng 405', 'gia_mac_dinh' => 600, 'tinh_trang' => '1', 'id_loai_phong' => '4'],
            ['id' => '36', 'ten_phong' => 'Phòng 406', 'gia_mac_dinh' => 600, 'tinh_trang' => '1', 'id_loai_phong' => '4'],
            ['id' => '37', 'ten_phong' => 'Phòng 407', 'gia_mac_dinh' => 600, 'tinh_trang' => '1', 'id_loai_phong' => '4'],
            ['id' => '38', 'ten_phong' => 'Phòng 408', 'gia_mac_dinh' => 600, 'tinh_trang' => '1', 'id_loai_phong' => '4'],
            ['id' => '39', 'ten_phong' => 'Phòng 409', 'gia_mac_dinh' => 600, 'tinh_trang' => '1', 'id_loai_phong' => '4'],
            ['id' => '40', 'ten_phong' => 'Phòng 410', 'gia_mac_dinh' => 600, 'tinh_trang' => '1', 'id_loai_phong' => '4'],

            // Loại phòng 5 - Phòng View Biển
            ['id' => '41', 'ten_phong' => 'Phòng 501', 'gia_mac_dinh' => 700, 'tinh_trang' => '1', 'id_loai_phong' => '5'],
            ['id' => '42', 'ten_phong' => 'Phòng 502', 'gia_mac_dinh' => 700, 'tinh_trang' => '1', 'id_loai_phong' => '5'],
            ['id' => '43', 'ten_phong' => 'Phòng 503', 'gia_mac_dinh' => 700, 'tinh_trang' => '1', 'id_loai_phong' => '5'],
            ['id' => '44', 'ten_phong' => 'Phòng 504', 'gia_mac_dinh' => 700, 'tinh_trang' => '1', 'id_loai_phong' => '5'],
            ['id' => '45', 'ten_phong' => 'Phòng 505', 'gia_mac_dinh' => 700, 'tinh_trang' => '1', 'id_loai_phong' => '5'],
            ['id' => '46', 'ten_phong' => 'Phòng 506', 'gia_mac_dinh' => 700, 'tinh_trang' => '1', 'id_loai_phong' => '5'],
            ['id' => '47', 'ten_phong' => 'Phòng 507', 'gia_mac_dinh' => 700, 'tinh_trang' => '1', 'id_loai_phong' => '5'],
            ['id' => '48', 'ten_phong' => 'Phòng 508', 'gia_mac_dinh' => 700, 'tinh_trang' => '1', 'id_loai_phong' => '5'],
            ['id' => '49', 'ten_phong' => 'Phòng 509', 'gia_mac_dinh' => 700, 'tinh_trang' => '1', 'id_loai_phong' => '5'],
            ['id' => '50', 'ten_phong' => 'Phòng 510', 'gia_mac_dinh' => 700, 'tinh_trang' => '1', 'id_loai_phong' => '5'],

            // Loại phòng 6 - Phòng VIP
            ['id' => '51', 'ten_phong' => 'Phòng 601', 'gia_mac_dinh' => 800, 'tinh_trang' => '1', 'id_loai_phong' => '6'],
            ['id' => '52', 'ten_phong' => 'Phòng 602', 'gia_mac_dinh' => 800, 'tinh_trang' => '1', 'id_loai_phong' => '6'],
            ['id' => '53', 'ten_phong' => 'Phòng 603', 'gia_mac_dinh' => 800, 'tinh_trang' => '1', 'id_loai_phong' => '6'],
            ['id' => '54', 'ten_phong' => 'Phòng 604', 'gia_mac_dinh' => 800, 'tinh_trang' => '1', 'id_loai_phong' => '6'],
            ['id' => '55', 'ten_phong' => 'Phòng 605', 'gia_mac_dinh' => 800, 'tinh_trang' => '1', 'id_loai_phong' => '6'],
            ['id' => '56', 'ten_phong' => 'Phòng 606', 'gia_mac_dinh' => 800, 'tinh_trang' => '1', 'id_loai_phong' => '6'],
            ['id' => '57', 'ten_phong' => 'Phòng 607', 'gia_mac_dinh' => 800, 'tinh_trang' => '1', 'id_loai_phong' => '6'],
            ['id' => '58', 'ten_phong' => 'Phòng 608', 'gia_mac_dinh' => 800, 'tinh_trang' => '1', 'id_loai_phong' => '6'],
            ['id' => '59', 'ten_phong' => 'Phòng 609', 'gia_mac_dinh' => 800, 'tinh_trang' => '1', 'id_loai_phong' => '6'],
            ['id' => '60', 'ten_phong' => 'Phòng 610', 'gia_mac_dinh' => 800, 'tinh_trang' => '1', 'id_loai_phong' => '6'],
        ]);
    }
}
