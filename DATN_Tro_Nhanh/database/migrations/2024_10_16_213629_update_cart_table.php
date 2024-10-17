<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCartTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            // Thay đổi kiểu dữ liệu cho các cột
            $table->unsignedBigInteger('price_list_id')->nullable(false)->change(); // Cột price_list_id
            $table->integer('quantity')->default(0)->change(); // Cột quantity
            $table->unsignedBigInteger('user_id')->nullable(false)->change(); // Cột user_id
            $table->timestamp('created_at')->useCurrent()->nullable()->change(); // Cột created_at
            $table->timestamp('updated_at')->useCurrent()->nullable()->change(); // Cột updated_at
            $table->string('status', 255)->default('1')->change(); // Cột status
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('cart', function (Blueprint $table) {
            // Phục hồi kiểu dữ liệu cũ nếu cần
            $table->unsignedBigInteger('price_list_id')->nullable()->change(); // Cột price_list_id
            $table->integer('quantity')->nullable()->change(); // Cột quantity
            $table->unsignedBigInteger('user_id')->nullable()->change(); // Cột user_id
            $table->timestamp('created_at')->nullable()->change(); // Cột created_at
            $table->timestamp('updated_at')->nullable()->change(); // Cột updated_at
            $table->string('status', 255)->nullable()->change(); // Cột status
        });
    }
}