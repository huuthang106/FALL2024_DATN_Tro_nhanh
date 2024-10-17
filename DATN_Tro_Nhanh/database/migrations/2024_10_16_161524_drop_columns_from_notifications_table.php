<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnsFromNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            // Xóa các cột
            $table->dropColumn([
                'blog_id',
                'room_id',
                'comment_id',
                'watchlist_id',
                'zone_id',
                'registration_list_id',
                'watch_list_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            // Thêm lại các cột nếu cần
            $table->unsignedBigInteger('blog_id')->nullable();
            $table->unsignedBigInteger('room_id')->nullable();
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->unsignedBigInteger('watchlist_id')->nullable();
            $table->unsignedBigInteger('zone_id')->nullable();
            $table->unsignedBigInteger('registration_list_id')->nullable();
            $table->unsignedBigInteger('watch_list_id')->nullable();
        });
    }
}