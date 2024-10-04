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
        Schema::table('rooms', function (Blueprint $table) {
            //
            $table->dropForeign(['tenant_id']); // Thay 'your_foreign_key_column' bằng tên cột khóa ngoại

            // Xóa cột
            $table->dropColumn('tenant_id'); // Thay 'your_foreign_key_column' bằng tên cột bạn muốn xóa
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('tenant_id')->nullable(); // Thay 'your_foreign_key_column' bằng tên cột bạn đã xóa

            // Thêm lại khóa ngoại nếu cần
            $table->foreign('tenant_id')->references('id')->on('your_referenced_table'); // Thay thế với tên bảng
        });
    }
};
