language:DATN_Tro_Nhanh/database/migrations/2024_10_16_165249_update_categories_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            // Thay đổi kiểu dữ liệu cho các cột
            $table->string('name', 50)->nullable(false)->change(); // Cột name
            // $table->tinyInteger('status')->nullable(false)->change(); // Cột status
            // $table->timestamp('create_at')->useCurrent()->nullable(false)->change(); // Cột create_at
            // $table->timestamp('update_at')->useCurrent()->nullable(false)->change(); // Cột update_at
            // $table->timestamp('delete_at')->nullable()->change(); // Cột delete_at
            // $table->string('slug', 255)->unique()->nullable(false)->change(); // Cột slug
        });
        Schema::table('identity', function (Blueprint $table) {
            // Thay đổi kiểu dữ liệu cho các cột
           
            $table->string('identification_number', 12)->nullable(false)->change(); // Cột identification_number
            $table->string('name', 30)->nullable()->change(); // Cột name
        });  Schema::table('locations', function (Blueprint $table) {
            // Thay đổi kiểu dữ liệu cho cột name
            $table->string('name', 50)->nullable(false)->change(); // Cột name

            // Thêm cột type_vip
            $table->integer('type_vip')->nullable(false)->after('name'); // Thêm cột type_vip
        });
        Schema::table('maintenance_requests', function (Blueprint $table) {
            // Thay đổi kiểu dữ liệu cho cột description
            $table->longText('description')->nullable()->change(); // Cột description
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            // Phục hồi kiểu dữ liệu cũ nếu cần
            $table->string('name', 50)->nullable()->change(); // Cột name
            // $table->tinyInteger('status')->nullable()->change(); // Cột status
            // $table->timestamp('create_at')->nullable()->change(); // Cột create_at
            // $table->timestamp('update_at')->nullable()->change(); // Cột update_at
            // $table->timestamp('delete_at')->nullable()->change(); // Cột delete_at
            // $table->string('slug', 255)->unique()->nullable()->change(); // Cột slug
        });
        Schema::table('identity', function (Blueprint $table) {
            // Phục hồi kiểu dữ liệu cũ nếu cần
            $table->longText('description')->nullable()->change(); // Cột description
            $table->string('identification_number', 12)->nullable()->change(); // Cột identification_number
            $table->string('name', 30)->nullable()->change(); // Cột name
        });
        Schema::table('locations', function (Blueprint $table) {
            // Phục hồi kiểu dữ liệu cũ cho cột name
            $table->string('name')->nullable()->change(); // Cột name

            // Xóa cột type_vip
            $table->dropColumn('type_vip'); // Xóa cột type_vip
        });
        Schema::table('maintenance_requests', function (Blueprint $table) {
            // Phục hồi kiểu dữ liệu cũ nếu cần
            $table->string('description')->nullable()->change(); // Giả sử kiểu cũ là string
        });
    }
}