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
        Schema::create('chi_tiet_thue_phongs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_phong');
            $table->integer('gia_thue');
            $table->integer('tinh_trang');
            $table->date('ngay_thue');
            $table->integer('id_hoa_don')->nullable();
            $table->string('ghi_chu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_thue_phongs');
    }
};
