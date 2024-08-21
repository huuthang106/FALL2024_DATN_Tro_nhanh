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
        Schema::table('rooms', function (Blueprint $table) {
            $table->string('province')->nullable(); // Thêm cột tên tỉnh, có thể null
            $table->string('district')->nullable();  // Thêm cột tên huyện, có thể null
            $table->string('village')->nullable();      // Thêm cột tên xã, có thể null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('rooms', function (Blueprint $table) {
            // Xóa các cột đã thêm trong phương thức up
            $table->dropColumn('province');
            $table->dropColumn('district');
            $table->dropColumn('village');
        });
    }
};
