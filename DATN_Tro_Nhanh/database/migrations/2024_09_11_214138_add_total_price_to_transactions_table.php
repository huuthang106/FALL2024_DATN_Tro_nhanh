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
           $table->decimal('total_price', 10, 2)->nullable()->after('description'); // Thêm cột total_price và cho phép giá trị NULL
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
           $table->dropColumn('total_price'); // Xóa cột total_price nếu cần quay lại
       });
   }
};
