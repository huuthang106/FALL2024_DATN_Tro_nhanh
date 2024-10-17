<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateIdentityTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('identity', function (Blueprint $table) {
            // Xóa cột gender
            $table->dropColumn('gender');

            // Thêm cột front_id_card_image và back_id_card_image
            $table->string('front_id_card_image', 255)->nullable(false);
            $table->string('back_id_card_image', 255)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('identity', function (Blueprint $table) {
            // Thêm lại cột gender
            $table->string('gender')->nullable();

            // Xóa các cột đã thêm
            $table->dropColumn(['front_id_card_image', 'back_id_card_image']);
        });
    }
}