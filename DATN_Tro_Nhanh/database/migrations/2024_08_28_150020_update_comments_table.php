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
        // Cập nhật bảng comments
        Schema::table('comments', function (Blueprint $table) {
            $table->foreignId('zone_id')->nullable()->constrained('zones')->onDelete('set null');
            $table->integer('rating')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hoàn tác cập nhật bảng comments
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['zone_id']);
            $table->dropColumn('zone_id');
            $table->integer('rating')->nullable(false)->change();
        });
    }
};
