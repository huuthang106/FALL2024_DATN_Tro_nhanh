language:DATN_Tro_Nhanh/database/migrations/2024_10_16_165246_update_blogs_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Thay đổi kiểu dữ liệu cho các cột
            $table->string('title', 255)->nullable(false)->change(); // Cột title
            $table->longText('description')->nullable(false)->change(); // Cột description
            $table->tinyInteger('status')->nullable(false)->change(); // Cột status
            $table->unsignedBigInteger('user_id')->nullable(false)->change(); // Cột user_id

            $table->string('slug', 255)->nullable(false)->unique()->change(); // Cột slug
            $table->integer('view')->nullable()->change(); // Cột view
            $table->longText('img')->nullable(false)->change(); // Cột img
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Phục hồi kiểu dữ liệu cũ nếu cần
            $table->string('title', 255)->nullable()->change(); // Cột title
            $table->longText('description')->nullable()->change(); // Cột description
            $table->timestamp('create_at')->nullable()->change(); // Cột create_at
            $table->timestamp('update_at')->nullable()->change(); // Cột update_at
            $table->tinyInteger('status')->nullable()->change(); // Cột status
            $table->unsignedBigInteger('user_id')->nullable()->change(); // Cột user_id
            $table->timestamp('delete_at')->nullable()->change(); // Cột delete_at
            $table->string('slug', 255)->nullable()->unique()->change(); // Cột slug
            $table->integer('view')->nullable()->change(); // Cột view
            $table->longText('img')->nullable()->change(); // Cột img
        });
    }
}