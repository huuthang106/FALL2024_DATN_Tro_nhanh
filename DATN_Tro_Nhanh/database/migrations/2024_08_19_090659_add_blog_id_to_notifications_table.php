<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            // Kiểm tra xem cột 'blog_id' đã tồn tại hay chưa trước khi thêm cột
            if (!Schema::hasColumn('notifications', 'blog_id')) {
                $table->unsignedBigInteger('blog_id')->nullable()->after('id'); // Thêm cột blog_id sau cột id
                $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade'); // Tạo khóa ngoại tới bảng blogs
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('notifications', function (Blueprint $table) {
        if (Schema::hasColumn('notifications', 'blog_id')) {
            $table->dropForeign(['blog_id']);
            $table->dropColumn('blog_id');
        }
    });
}
};
