<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRegistrationListsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('registration_lists', function (Blueprint $table) {
            // Xóa các cột
            $table->dropColumn(['name', 'identification_number']);
            
            // Xóa khóa ngoại và cột user_id
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            // Thêm cột identity_id
            $table->unsignedBigInteger('identity_id')->nullable();

            // Thêm khóa ngoại cho identity_id
            $table->foreign('identity_id')->references('id')->on('identity')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('registration_lists', function (Blueprint $table) {
            // Thêm lại các cột đã xóa
            $table->string('name')->nullable();
            $table->string('identification_number')->nullable();

            // Thêm lại cột user_id và khóa ngoại
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Xóa cột identity_id
            $table->dropForeign(['identity_id']);
            $table->dropColumn('identity_id');
        });
    }
}