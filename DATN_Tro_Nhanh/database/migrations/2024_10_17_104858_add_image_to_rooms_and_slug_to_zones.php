<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToRoomsAndSlugToZones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Xóa cột slug khỏi bảng rooms nếu nó tồn tại
        Schema::table('rooms', function (Blueprint $table) {
            if (Schema::hasColumn('rooms', 'slug')) {
                $table->dropColumn('slug'); // Xóa cột slug
            }
            $table->string('image')->nullable(); // Thêm cột image, có thể null
        });

        // Thêm cột slug vào bảng zones
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Xóa cột image khỏi bảng rooms
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('image');
        });

       
    }
}
