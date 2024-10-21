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
        Schema::table('rooms', function (Blueprint $table) {
            // Thay đổi kiểu dữ liệu của cột price thành decimal(10,2)
            $table->decimal('price', 10, 2)->change();
        });
    }

    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            // Khôi phục kiểu dữ liệu cũ nếu cần (thay đổi theo kiểu dữ liệu cũ)
            $table->float('price')->change(); // Hoặc kiểu dữ liệu cũ mà bạn đã sử dụng
        });
    }
};
