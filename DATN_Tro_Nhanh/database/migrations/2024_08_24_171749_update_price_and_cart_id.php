<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('cart_details', function (Blueprint $table) {
            //
            Schema::table('cart_details', function (Blueprint $table) {
                $table->double('price')->after('end_date'); // Thêm cột price kiểu double
                $table->unsignedBigInteger('cart_id')->nullable()->after('price'); // Thêm cột cart_id kiểu bigint, cho phép NULL

                // Định nghĩa khóa ngoại
                $table->foreign('cart_id')->references('id')->on('carts')->onDelete('set null');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cart_details', function (Blueprint $table) {
            //
            Schema::table('cart_details', function (Blueprint $table) {
                // Xóa ràng buộc khóa ngoại trước khi xóa cột
                $table->dropForeign(['cart_id']);

                $table->dropColumn('cart_id');
                $table->dropColumn('price');
            });
        });
    }
};
