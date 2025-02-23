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
        Schema::create('phongs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_phong');
            $table->integer('gia_mac_dinh');
            $table->integer('tinh_trang');
            $table->integer('id_loai_phong');
            $table->longText('tien_ich_khac')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phongs');
    }
};
