<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('utilities', function (Blueprint $table) {
            // Sửa lại cột room_id để có thể null
            $table->unsignedBigInteger('room_id')->nullable()->change();
        
            // Thêm cột zone_id có thể null
            $table->unsignedBigInteger('zone_id')->nullable()->after('room_id');
        
            // Thêm khóa ngoại cho zone_id
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');
        
            // Xóa cột zone_name nếu không còn cần thiết nữa
            // $table->dropColumn('zone_name');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('utilities', function (Blueprint $table) {
            // Xóa khóa ngoại cho cột zone_id
            $table->dropForeign(['zone_id']);
        
            // Thêm lại cột zone_name sau cột room_id
            $table->string('zone_name')->after('room_id');
        
            // Xóa cột zone_id
            $table->dropColumn('zone_id');
        });
        
    }

};
