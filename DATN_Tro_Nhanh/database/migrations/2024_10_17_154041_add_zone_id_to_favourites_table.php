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
        Schema::table('favourites', function (Blueprint $table) {
            // Xóa khóa ngoại liên quan đến room_id trước khi xóa cột
            $table->dropForeign(['room_id']); // Xóa khóa ngoại nếu có

            // Xóa cột room_id
            $table->dropColumn('room_id'); // Xóa cột room_id

            // Thêm cột zone_id
            $table->unsignedBigInteger('zone_id')->nullable()->after('user_id'); // Thêm cột zone_id

            // Tạo khóa ngoại cho zone_id
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('favourites', function (Blueprint $table) {
            // Xóa khóa ngoại nếu có
            $table->dropForeign(['zone_id']);
            // Xóa cột zone_id
            $table->dropColumn('zone_id');
            // Thêm lại cột room_id nếu cần
            $table->unsignedBigInteger('room_id')->nullable()->after('user_id'); // Thêm lại cột room_id
        });
    }
};
