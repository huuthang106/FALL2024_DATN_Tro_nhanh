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
        // Xóa các khóa ngoại và cột trong bảng `rooms`
        Schema::table('rooms', function (Blueprint $table) {
            // Xóa khóa ngoại của `area_id`
            $table->dropForeign(['area_id']);
            // Xóa khóa ngoại của `room_type_id`
            $table->dropForeign(['room_type_id']);
            // Xóa các cột `area_id` và `room_type_id`
            $table->dropColumn(['area_id', 'room_type_id']);
        });

        // Xóa các bảng `areas` và `room_types`
        Schema::dropIfExists('areas');
        Schema::dropIfExists('room_types');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Tạo lại bảng `room_types`
        Schema::create('room_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Khôi phục các cột và khóa ngoại trong bảng `rooms`
        Schema::table('rooms', function (Blueprint $table) {
            // Thêm lại các cột
            // $table->foreignId('area_id')->nullable()->constrained('areas')->onDelete('set null');
            $table->foreignId('room_type_id')->nullable()->constrained('room_types')->onDelete('set null');
        });
    }
};
