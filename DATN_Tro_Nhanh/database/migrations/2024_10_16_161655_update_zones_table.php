<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateZonesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('zones', function (Blueprint $table) {
            // Thêm cột phone
            $table->string('phone', 10)->nullable();

            // Sửa cột total_rooms thành quantity
            $table->renameColumn('total_rooms', 'quantity');

            // Thêm các cột mới
            $table->unsignedBigInteger('category_id')->nullable();
            $table->boolean('wifi')->default(0);
            $table->boolean('bathrooms')->default(0);
            $table->boolean('air_conditioning')->default(0);
            $table->boolean('garage')->default(0);
            $table->boolean('type_vip')->default(0);
            $table->timestamp('vip_expiry_date')->nullable();
            $table->integer('view')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('zones', function (Blueprint $table) {
            // Xóa các cột đã thêm
            $table->dropColumn(['phone', 'category_id', 'wifi', 'bathrooms', 'air_conditioning', 'garage', 'type_vip', 'vip_expiry_date', 'view']);

            // Đổi tên cột quantity về lại total_rooms
            $table->renameColumn('quantity', 'total_rooms');
        });
    }
}