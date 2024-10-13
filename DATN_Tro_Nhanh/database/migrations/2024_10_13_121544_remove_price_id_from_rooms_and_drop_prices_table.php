<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Xóa khóa ngoại và cột price_id trong bảng rooms
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign(['price_id']); // Xóa khóa ngoại
            $table->dropColumn('price_id'); // Xóa cột
        });

        // Xóa bảng prices
        Schema::dropIfExists('prices');
    }

    public function down()
    {
        // Thêm lại bảng prices
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Thêm lại cột price_id vào bảng rooms và khóa ngoại
        Schema::table('rooms', function (Blueprint $table) {
            $table->foreignId('price_id')->nullable()->constrained('prices')->onDelete('cascade');
        });
    }
};
