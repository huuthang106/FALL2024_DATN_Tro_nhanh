<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentZonesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Schema::create('comment_zones', function (Blueprint $table) {
        //     $table->id(); // Tạo cột ID tự động tăng
        //     $table->longText('content'); // Cột nội du
        //     $table->tinyInteger('status'); // Cột trạng thái
        //     $table->unsignedBigInteger('user_id'); // Cột user_id
        //     $table->unsignedBigInteger('zone_id'); // Cột zone_id
        //     $table->timestamp('delete_at')->nullable(); // Cột thời gian xóa
        //     $table->integer('rating')->nullable(); // Cột đánh giá

        //     // Khóa ngoại
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        //     $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');

        //     $table->timestamps(); // Tạo cột created_at và updated_at
        // });
        Schema::create('comment_blog', function (Blueprint $table) {
            $table->id(); // Tạo cột ID tự động tăng
            $table->longText('content'); // Cột nội dung
           
            $table->tinyInteger('status'); // Cột trạng thái
            $table->unsignedBigInteger('user_id'); // Cột user_id
            $table->unsignedBigInteger('blog_id'); // Cột blog_id
            $table->timestamp('delete_at')->nullable(); // Cột thời gian xóa

            // Khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');

            $table->timestamps(); // Tạo cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('comment_zones');
        Schema::dropIfExists('comment_blog');
    }
}