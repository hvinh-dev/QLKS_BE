<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nhan_viens', function (Blueprint $table) {
            $table->id();
            $table->string('ma_nhan_vien');
            $table->string('ho_va_ten');
            $table->date('ngay_sinh');
            $table->integer('luong_co_ban');
            $table->integer('id_chuc_vu');
            $table->date('ngay_bat_dau');
            $table->string('so_dien_thoai');
            $table->string('email');
            $table->string('password');
            $table->integer('tinh_trang');
            $table->string('avatar');
            $table->integer('is_master')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhan_viens');
    }
};
