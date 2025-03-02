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
        Schema::table('khach_hangs', function (Blueprint $table) {
            if (Schema::hasColumn('khach_hangs', 'avatar')) {
                $table->dropColumn('avatar');
            }
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
