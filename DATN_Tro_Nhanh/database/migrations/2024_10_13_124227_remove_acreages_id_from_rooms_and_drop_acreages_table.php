<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Xóa khóa ngoại và cột acreages_id trong bảng rooms
        Schema::table('acreages', function (Blueprint $table) {
            $table->softDeletes(); // Thêm cột deleted_at
        });

        // // Xóa bảng acreages
        // Schema::dropIfExists('acreages');
    }

    public function down()
    {
        // Tạo lại bảng acreages
        // Schema::create('acreages', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->timestamps();
        // });

        // // Thêm lại cột acreages_id vào bảng rooms và khóa ngoại
        // Schema::table('rooms', function (Blueprint $table) {
        //     $table->foreignId('acreages_id')->nullable()->constrained('acreages')->onDelete('cascade');
        // });
    }
};

