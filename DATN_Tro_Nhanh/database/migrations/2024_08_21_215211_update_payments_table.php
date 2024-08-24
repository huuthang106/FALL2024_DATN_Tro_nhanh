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
        // Schema::rename('bills', 'payments');
        Schema::table('payments', function (Blueprint $table) {
            //
            $table->dropForeign(['resident_id']);

            $table->dropColumn('resident_id');
        });
        Schema::rename('payments', 'bills');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void

    {


        Schema::rename('bills', 'payments');

        // // Thực hiện các thay đổi ngược lại trên bảng 'payments'
        Schema::table('payments', function (Blueprint $table) {
            // Xóa cột mới nếu cần
            if (Schema::hasColumn('payments', 'title')) {
                $table->dropColumn('title');
            }

            // Thêm cột cũ 'resident_id' nếu cần
            // $table->unsignedBigInteger('resident_id')->nullable();

            // Tạo khóa ngoại trở lại nếu cần
            $table->foreign('resident_id')->references('id')->on('residents')->onDelete('cascade');
        });
    }
};
