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
        Schema::table('zones', function (Blueprint $table) {
            // Thêm cột category_id
            $table->unsignedBigInteger('category_id')->nullable(false)->change();

            // Thêm lại khóa ngoại mới
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('zones', function (Blueprint $table) {
            // Xóa khóa ngoại
            $table->dropForeign(['category_id']);

        });
    }
};
