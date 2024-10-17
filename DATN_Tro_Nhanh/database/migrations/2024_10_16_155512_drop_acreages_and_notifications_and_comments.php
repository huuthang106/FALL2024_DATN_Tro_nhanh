<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropAcreagesAndNotificationsAndComments extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Xóa bảng acreages
        Schema::dropIfExists('acreages');
        Schema::table('rooms', function (Blueprint $table) {
            // Xóa các cột
            // $table->dropForeign(['user_id']);
            // $table->dropColumn(['user_id', 'phone', 'address', 'quantity','expiration_date']);
        });
        // Xóa khóa ngoại trong bảng notifications
        Schema::table('notifications', function (Blueprint $table) {
            // Xóa khóa ngoại nếu tồn tại
            // $table->dropForeign(['comment_id']);
            // $table->dropForeign(['watchlist_id']);
            // $table->dropForeign(['zone_id']);
            // $table->dropForeign(['registration_list_id']);
            // $table->dropForeign(['watch_list_id']);

            // Xóa cột
            $table->dropColumn(['comment_id', 'watchlist_id', 'registration_list_id', 'watch_list_id']);
        });
        // Xóa bảng comments
        Schema::dropIfExists('comments');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Phục hồi bảng comments
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            // Thêm các cột cần thiết cho bảng comments
            $table->text('content');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        // Phục hồi bảng acreages
        Schema::create('acreages', function (Blueprint $table) {
            $table->id();
            // Thêm các cột cần thiết cho bảng acreages
            $table->string('name');
            $table->timestamps();
        });

        // Phục hồi khóa ngoại trong bảng notifications
        Schema::table('notifications', function (Blueprint $table) {
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->unsignedBigInteger('watchlist_id')->nullable();
            $table->unsignedBigInteger('zone_id')->nullable();
            $table->unsignedBigInteger('registration_list_id')->nullable();
            $table->unsignedBigInteger('watch_list_id')->nullable();

            // Thêm lại các khóa ngoại
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
            $table->foreign('watchlist_id')->references('id')->on('watchlists')->onDelete('cascade');
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');
            $table->foreign('registration_list_id')->references('id')->on('registration_lists')->onDelete('cascade');
            $table->foreign('watch_list_id')->references('id')->on('watch_lists')->onDelete('cascade');
        });
    }
}