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
        Schema::table('notifications', function (Blueprint $table) {
            // Sửa đổi cột 'blog_id' để cho phép NULL
            $table->unsignedBigInteger('blog_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notifications', function (Blueprint $table) {
            // Quay lại không cho phép NULL (nếu cần thiết)
            $table->unsignedBigInteger('blog_id')->nullable(false)->change();
        });
    }
};
