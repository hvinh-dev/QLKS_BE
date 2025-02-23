<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            LoaiPhongSeeder::class,
            PhongSeeder::class,
            DichVuSeeder::class,
            SlideSeeder::class,
            ReviewSeeder::class,
            ChucNangSeeder::class,
            NhanVienSeeder::class,
            BaiVietSeeder::class,
            PhanQuyenSeeder::class,
            KhachHangSeeder::class,
            ChiTietPhanQuyenSeeder::class,
        ]);
    }
}
