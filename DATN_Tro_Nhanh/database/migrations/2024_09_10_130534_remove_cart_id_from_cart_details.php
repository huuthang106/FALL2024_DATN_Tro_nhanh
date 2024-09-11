<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('cart_details', function (Blueprint $table) {
            // Xóa ràng buộc khóa ngoại trước khi xóa cột
            $table->dropForeign(['cart_id']);

            // Xóa cột cart_id
            $table->dropColumn('cart_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('cart_details', function (Blueprint $table) {
            // Thêm cột cart_id kiểu bigint, cho phép NULL
            $table->unsignedBigInteger('cart_id')->nullable()->after('price');

            // Định nghĩa lại khóa ngoại
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('set null');
        });
    }
};
