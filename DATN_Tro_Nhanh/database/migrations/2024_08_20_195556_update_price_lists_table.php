<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePriceListsTable extends Migration
{
    public function up(): void
    {
        Schema::table('price_lists', function (Blueprint $table) {
            // Thêm cột location_id
            $table->unsignedBigInteger('location_id')->after('description');

            // Đổi tên cột từ location_name thành location_id
            // $table->dropColumn('location_name'); // Xóa cột cũ nếu không cần thiết nữa

            // Thêm khóa ngoại cho location_id
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');

            // Nếu cần, có thể xóa cột location_name nếu không còn cần thiết
            $table->dropColumn('location_name');
        });
    }

    public function down(): void
    {
        Schema::table('price_lists', function (Blueprint $table) {
            // Xóa khóa ngoại
            $table->dropForeign(['location_id']);
            
            // Thêm lại cột location_name
            $table->string('location_name')->after('description');

            // Xóa cột location_id
            $table->dropColumn('location_id');
        });
    }
}

