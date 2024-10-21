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
        Schema::create('vip_zone_positions', function (Blueprint $table) {
            $table->id(); // Tạo cột ID tự động tăng
            $table->unsignedBigInteger('zone_id'); // Cột zone_id kiểu int, không cho null
            $table->unsignedBigInteger('location_id'); // Cột location_id kiểu int, không cho null
            $table->tinyInteger('status')->default(1); // Cột status kiểu TINYINT(1), không cho null, mặc định là 1
            $table->timestamps(); // Timestamps cho created_at và updated_at
            $table->timestamp('end_date')->nullable(); // Cột end_date kiểu timestamp, có thể null
        });
        Schema::dropIfExists('cart_details');
        Schema::dropIfExists('carts');
     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vip_zone_positions'); // Xóa bảng nếu rollback
    }
};
