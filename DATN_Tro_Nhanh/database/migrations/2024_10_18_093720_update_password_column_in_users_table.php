<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePasswordColumnInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password', length: 255)->change();
            $table->string('email', 255)->change(); // Hoặc kích thước khác nếu cần
            $table->string('slug', 255)->change(); // Hoặc kích thước khác nếu cần
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password', 60)->change(); // Giả sử kích thước cũ là 60
        });
    }
}