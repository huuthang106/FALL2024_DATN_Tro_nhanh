<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePriceListTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('price_lists', function (Blueprint $table) {
            // Thay đổi kiểu dữ liệu cho các cột
            $table->decimal('price', 10, 2)->nullable(false)->change(); // Cột price
            $table->string('description', 100)->nullable(false)->change(); // Cột description
        });
        
        // Schema::table('residents', function (Blueprint $table) {
        //     // Xóa khóa ngoại zone_id
        //     $table->dropForeign(['zone_id']); // Xóa khóa ngoại zone_id

        //     // Xóa cột zone_id
        //     $table->dropColumn('zone_id'); // Xóa cột zone_id
        // });
        Schema::table('transactions', function (Blueprint $table) {
            // Xóa khóa ngoại bill_id nếu có
            if (Schema::hasColumn('transactions', 'bill_id')) {
                $table->dropForeign(['bill_id']); // Xóa khóa ngoại bill_id
            }

            // Xóa khóa ngoại cart_detail_id nếu có
            if (Schema::hasColumn('transactions', 'cart_detail_id')) {
                $table->dropForeign(['cart_detail_id']); // Xóa khóa ngoại cart_detail_id
            }

            // Xóa các cột amount_withdrawn, cart_detail_id, bill_id
            $table->dropColumn(['amount_withdrawn', 'cart_detail_id', 'bill_id']); // Xóa các cột
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('price_list', function (Blueprint $table) {
            // Phục hồi kiểu dữ liệu cũ nếu cần
            $table->decimal('price', 10, 2)->nullable()->change(); // Cột price
            $table->string('description', 100)->nullable()->change(); // Cột description
        });
       
        Schema::table('residents', function (Blueprint $table) {
            // Thêm lại cột zone_id nếu cần
            $table->unsignedBigInteger('zone_id')->nullable()->after('some_column'); // Thay 'some_column' bằng tên cột mà bạn muốn thêm sau

            // Thêm lại khóa ngoại zone_id
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade'); // Thay 'zones' bằng tên bảng tương ứng
        });
        Schema::table('transactions', function (Blueprint $table) {
            // Thêm lại các cột nếu cần
            $table->decimal('amount_withdrawn', 10, 2)->nullable()->after('some_column'); // Thay 'some_column' bằng tên cột mà bạn muốn thêm sau
            $table->unsignedBigInteger('cart_detail_id')->nullable()->after('amount_withdrawn'); // Thay 'amount_withdrawn' bằng tên cột mà bạn muốn thêm sau
            $table->unsignedBigInteger('bill_id')->nullable()->after('cart_detail_id'); // Thay 'cart_detail_id' bằng tên cột mà bạn muốn thêm sau
        });
    }
}
