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
        //
        Schema::table('notifications', function (Blueprint $table) {
            // Thêm khóa ngoại liên kết đến bảng watch_list
            $table->unsignedBigInteger('watch_list_id')->nullable(); // ID của bảng watch_list

            // Thêm khóa ngoại
            $table->foreign('watch_list_id')->references('id')->on('watch_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('notifications', function (Blueprint $table) {
            // Xóa khóa ngoại và cột đã thêm
            $table->dropForeign(['watch_list_id']);
            $table->dropColumn('watch_list_id');
        });
    }
};
