<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhanQuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { {
            DB::table('phan_quyens')->delete();
            DB::table('phan_quyens')->truncate();
            DB::table('phan_quyens')->insert([
                [
                    'ten_quyen'      =>  'Admin',
                ],
                [
                    'ten_quyen'      =>  'Nhân Viên',
                ],
                [
                    'ten_quyen'      =>  'Quản Lý',
                ],
                [
                    'ten_quyen'      =>  'Kế Toán',
                ],
            ]);
        }
    }
}
