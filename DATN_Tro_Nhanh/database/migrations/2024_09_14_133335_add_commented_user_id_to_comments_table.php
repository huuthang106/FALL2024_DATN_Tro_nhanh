<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommentedUserIdToCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            // Thêm cột commented_user_id
            $table->unsignedBigInteger('commented_user_id')->nullable();

            // Thêm khóa ngoại cho commented_user_id
            $table->foreign('commented_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            // Xóa khóa ngoại cho commented_user_id
            $table->dropForeign(['commented_user_id']);

            // Xóa cột commented_user_id
            $table->dropColumn('commented_user_id');
        });
    }
}