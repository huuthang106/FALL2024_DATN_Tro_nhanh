<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBillsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->integer('quantity')->default(1); // Thay 'some_column' bằng tên cột mà bạn muốn thêm sau
        });

        // Xóa cột quantity khỏi bảng zone
        Schema::table('zones', function (Blueprint $table) {
            $table->dropColumn('quantity'); // Xóa cột quantity
        });
        Schema::table('bills', function (Blueprint $table) {
            // Thay đổi kiểu dữ liệu và thêm các cột cần thiết
          
            $table->timestamp('payment_date')->nullable()->change(); // Cột payment_date
            $table->decimal('amount', 10, 2)->nullable(false)->change(); // Cột amount
            $table->timestamp('created_at')->useCurrent()->nullable(false)->change(); // Cột created_at
            $table->timestamp('updated_at')->useCurrent()->nullable(false)->change(); // Cột updated_at
            $table->tinyInteger('status')->nullable(false)->change(); // Cột status
            $table->timestamp('deleted_at')->nullable()->change(); // Cột deleted_at
            $table->longText('description')->nullable(false)->change(); // Cột description
          
            $table->string('title', 255)->nullable(false)->change(); // Cột title
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('quantity'); // Xóa cột quantity
        });

        // Thêm lại cột quantity vào bảng zone
        Schema::table('zones', function (Blueprint $table) {
            $table->integer('quantity')->nullable(); // Thay 'some_column' bằng tên cột mà bạn muốn thêm sau
        });
        Schema::table('bills', function (Blueprint $table) {
            // Phục hồi kiểu dữ liệu cũ nếu cần
            $table->unsignedBigInteger('creator_id')->nullable()->change(); // Cột creator_id
            $table->timestamp('payment_date')->nullable()->change(); // Cột payment_date
            $table->decimal('amount', 10, 2)->nullable()->change(); // Cột amount
            $table->timestamp('created_at')->nullable()->change(); // Cột created_at
            $table->timestamp('updated_at')->nullable()->change(); // Cột updated_at
            $table->tinyInteger('status')->nullable()->change(); // Cột status
            $table->timestamp('deleted_at')->nullable()->change(); // Cột deleted_at
            $table->longText('description')->nullable()->change(); // Cột description
            $table->unsignedBigInteger('payer_id')->nullable()->change(); // Cột payer_id
            $table->string('title', 255)->nullable()->change(); // Cột title
        });
    }
}