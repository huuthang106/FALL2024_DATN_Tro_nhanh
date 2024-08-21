<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
            $table->foreignId('cart_detail_id')->nullable()->constrained('cart_details')->onDelete('cascade');
            $table->foreignId('bill_id')->nullable()->constrained('bills')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
            Schema::table('transactions', function (Blueprint $table) {
                // Xóa khóa ngoại `cart_detail_id` nếu tồn tại
                if (Schema::hasColumn('transactions', 'cart_detail_id')) {
                    $table->dropForeign(['cart_detail_id']);
                }
    
                // Xóa khóa ngoại `bill_id` nếu tồn tại
                if (Schema::hasColumn('transactions', 'bill_id')) {
                    $table->dropForeign(['bill_id']);
                }
    
                // Xóa cột `cart_detail_id`
                $table->dropColumn('cart_detail_id');
    
                // Xóa cột `bill_id`
                $table->dropColumn('bill_id');
            });
        });
    }
};
