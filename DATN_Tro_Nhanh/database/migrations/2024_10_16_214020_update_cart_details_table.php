<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('cart_details', function (Blueprint $table) {
            // Thêm cột cart_id làm khóa ngoại
            $table->unsignedBigInteger('cart_id')->nullable(false)->after('id'); // Thay 'id' bằng tên cột mà bạn muốn thêm sau

            // Thay đổi kiểu dữ liệu cho các cột
            $table->string('name_price_list', 50)->nullable(false)->change(); // Cột name_price_list
            $table->longText('description')->nullable()->change(); // Cột description
            $table->string('name_location', 255)->nullable(false)->change(); // Cột name_location
            // $table->timestamp('create_at')->useCurrent()->nullable(false)->change(); // Cột create_at
            // $table->timestamp('update_at')->useCurrent()->nullable(false)->change(); // Cột update_at
            // $table->timestamp('end_date')->nullable()->change(); // Cột end_date

            // Thêm khóa ngoại
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('cart_details', function (Blueprint $table) {
            // Xóa khóa ngoại
            $table->dropForeign(['cart_id']);

            // Xóa cột cart_id
            $table->dropColumn('cart_id'); // Xóa cột cart_id

            // Phục hồi kiểu dữ liệu cũ nếu cần
            $table->string('name_price_list', 50)->nullable()->change(); // Cột name_price_list
            $table->longText('description')->nullable()->change(); // Cột description
            $table->string('name_location', 255)->nullable()->change(); // Cột name_location
            // $table->timestamp('create_at')->nullable()->change(); // Cột create_at
            // $table->timestamp('update_at')->nullable()->change(); // Cột update_at
            // $table->timestamp('end_date')->nullable()->change(); // Cột end_date
        });
    }
}