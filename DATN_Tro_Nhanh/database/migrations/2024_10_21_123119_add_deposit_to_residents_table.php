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
        Schema::table('residents', function (Blueprint $table) {
            // Thêm cột deposit với kiểu dữ liệu decimal(10,2)
            $table->decimal('deposit', 10, 2)->nullable(); // Có thể để null nếu không bắt buộc
        });
    }

    public function down()
    {
        Schema::table('residents', function (Blueprint $table) {
            // Xóa cột deposit nếu cần khôi phục
            $table->dropColumn('deposit');
        });
    }
};
