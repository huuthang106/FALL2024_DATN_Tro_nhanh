<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
    {
        // Xóa bảng utilities
        Schema::dropIfExists('utilities');

        // Cập nhật bảng rooms
        Schema::table('rooms', function (Blueprint $table) {
            // Xóa khóa ngoại và cột cùng một lúc
            // $table->dropForeign(['location_id']);
            // $table->dropForeign(['category_id']);
            // $table->dropForeign(['price_id']);
            // $table->dropForeign(['acreages_id']);
            // $table->dropForeign(['user_id']);

            // Xóa cột
            $table->dropColumn(['longitude', 'latitude', 'view', 'province', 'district', 'village', 'acreages_id']);
        });
    }

    public function down()
    {
        // Phục hồi bảng utilities
        Schema::create('utilities', function (Blueprint $table) {
            $table->id();
            // Thêm các cột cần thiết cho bảng utilities
            $table->string('name');
            $table->timestamps();
        });

        // Phục hồi bảng rooms
        Schema::table('rooms', function (Blueprint $table) {
            // Thêm lại các cột đã xóa
            $table->decimal('longitude', 10, 8)->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->integer('view')->nullable();
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->string('village')->nullable();
            $table->unsignedBigInteger('acreages_id')->nullable();
            $table->unsignedBigInteger('tenant_id')->nullable();

            // Thêm lại các khóa ngoại
            // $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            // $table->foreign('price_id')->references('id')->on('prices')->onDelete('cascade');
            // $table->foreign('acreages_id')->references('id')->on('acreages')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
