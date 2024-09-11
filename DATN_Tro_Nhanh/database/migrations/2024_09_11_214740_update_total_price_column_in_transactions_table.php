<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
     * Thực hiện migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Chuyển đổi kiểu dữ liệu cột total_price thành double
            $table->double('total_price', 15, 8)->nullable()->change();
        });
    }

    /**
     * Đảo ngược migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Quay lại kiểu dữ liệu cũ nếu cần, ví dụ decimal
            $table->decimal('total_price', 10, 2)->nullable()->change();
        });
    }
};
