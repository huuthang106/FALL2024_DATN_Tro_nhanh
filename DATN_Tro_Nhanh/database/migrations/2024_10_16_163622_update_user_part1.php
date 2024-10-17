<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserPart1 extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Thay đổi kiểu dữ liệu của các cột
            $table->string('name', 30)->nullable(false)->change();
            $table->string('email', 20)->nullable(false)->change();
            $table->string('password', 50)->nullable(false)->change();
            $table->string('phone', 10)->nullable()->change();
            $table->string('address', 100)->nullable()->change();
            $table->tinyInteger('role')->nullable(false)->change();
            $table->decimal('balance', 10, 2)->nullable()->change();
            $table->tinyInteger('status')->nullable(false)->change();
            $table->string('provider', 255)->nullable()->change();
            $table->string('provider_id', 255)->nullable()->change();
         
            
            $table->longText('image')->nullable()->change();
           
            $table->string('bank_name', 100)->nullable()->change();
            $table->string('bank_account', 25)->nullable()->change();
            $table->string('card_holder_name', 50)->nullable(false)->change();

            // Thêm cột gender, cho phép null
            // $table->tinyInteger('gender')->nullable()->after('balance');

            // Thêm cột identification_number, cho phép null
            // $table->string('identification_number', 100)->nullable()->after('gender'); // Cột identification_number có thể null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Xóa cột identification_number nếu cần
            $table->dropColumn('identification_number');

            // Xóa cột gender nếu cần
            $table->dropColumn('gender');

            // Phục hồi kiểu dữ liệu cũ nếu cần
            // Bạn có thể thêm mã phục hồi ở đây nếu cần
        });
    }
}