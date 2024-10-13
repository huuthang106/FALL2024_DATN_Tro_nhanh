<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropImagesmembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('imagesmembers');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Nếu bạn muốn khôi phục bảng này, bạn có thể định nghĩa lại cấu trúc bảng ở đây
        Schema::create('imagesmembers', function (Blueprint $table) {
            $table->id();
            $table->string('image_path'); // Thay đổi theo cấu trúc bảng của bạn
            $table->timestamps();
        });
    }
}