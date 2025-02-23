<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loai_phongs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_loai_phong');
            $table->string('so_giuong');
            $table->integer('so_nguoi_lon');
            $table->integer('so_tre_em');
            $table->integer('dien_tich');
            $table->string('hinh_anh');
            $table->longText('tien_ich');
            $table->integer('tinh_trang');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loai_phongs');
    }
};
