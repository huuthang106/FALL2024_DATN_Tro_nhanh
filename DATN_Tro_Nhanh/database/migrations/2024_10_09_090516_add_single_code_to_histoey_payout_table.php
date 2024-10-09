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
        Schema::table('payout_history', function (Blueprint $table) {
            // Thêm cột single_code dạng chuỗi, có thể là unique nếu cần
            $table->string('single_code', 10)->nullable();
        });
        
        // Tạo các giá trị random cho cột single_code
        \DB::table('payout_history')->get()->each(function ($row) {
            \DB::table('payout_history')
                ->where('id', $row->id)
                ->update(['single_code' => '#' . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT)]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payout_history', function (Blueprint $table) {
            $table->dropColumn('single_code'); // Xóa cột khi rollback
        });
    }
};
