<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropAcreagesPricesAndComments extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Xóa bảng acreages
        Schema::dropIfExists('acreages');

        // Xóa bảng prices
        Schema::dropIfExists('prices');

        // Cập nhật bảng registration_lists để xóa cột gender
        Schema::table('registration_lists', function (Blueprint $table) {
            if (Schema::hasColumn('registration_lists', 'gender')) {
                $table->dropColumn('gender');
            }
        });

        // Xóa bảng comments
        Schema::dropIfExists('comments');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Phục hồi bảng comments nếu cần
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            // Thêm các cột cần thiết cho bảng comments
            $table->text('content');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        // Phục hồi bảng prices nếu cần
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            // Thêm các cột cần thiết cho bảng prices
            $table->decimal('amount', 10, 2);
            $table->timestamps();
        });

        // Phục hồi bảng acreages nếu cần
        Schema::create('acreages', function (Blueprint $table) {
            $table->id();
            // Thêm các cột cần thiết cho bảng acreages
            $table->string('name');
            $table->timestamps();
        });

        // Phục hồi cột gender trong bảng registration_lists nếu cần
        Schema::table('registration_lists', function (Blueprint $table) {
            $table->tinyInteger('gender')->nullable();
        });
    }
}