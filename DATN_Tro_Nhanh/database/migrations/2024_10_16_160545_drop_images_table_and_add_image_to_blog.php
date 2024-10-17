<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropImagesTableAndAddImageToBlog extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Xóa bảng images
        Schema::dropIfExists('images');

        // Cập nhật bảng notifications
        // Schema::table('notifications', function (Blueprint $table) {
        //     // Xóa khóa ngoại nếu tồn tại
        //     if (Schema::hasColumn('notifications', 'comment_id')) {
        //         $table->dropForeign('notifications_comment_id_foreign');
        //     }
        //     if (Schema::hasColumn('notifications', 'watchlist_id')) {
        //         $table->dropForeign('notifications_watchlist_id_foreign');
        //     }
        //     if (Schema::hasColumn('notifications', 'zone_id')) {
        //         $table->dropForeign('notifications_zone_id_foreign');
        //     }
        //     if (Schema::hasColumn('notifications', 'registration_list_id')) {
        //         $table->dropForeign('notifications_registration_list_id_foreign');
        //     }
        //     if (Schema::hasColumn('notifications', 'watch_list_id')) {
        //         $table->dropForeign('notifications_watch_list_id_foreign');
        //     }

        //     // Xóa các cột
        //     $table->dropColumn(['room_id', 'watchlist_id', 'blog_id', 'comment_id', 'registration_list_id', 'watch_list_id']);
        // });

        // Cập nhật bảng blog
        Schema::table('blogs', function (Blueprint $table) {
            // Thêm cột image kiểu longtext
            $table->longText('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Phục hồi bảng images
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            // Thêm các cột cần thiết cho bảng images
            $table->string('url');
            $table->timestamps();
        });

        // Xóa cột image trong bảng blog
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('image');
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