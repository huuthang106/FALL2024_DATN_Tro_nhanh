<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Xóa các cột
            $table->dropColumn([
                'token',
                // 'facebook_id',
                'identification_number',
                'email_verified_at',
                'provider_token',
                'remember_token'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Thêm lại các cột nếu cần
            $table->string('token')->nullable();
            // $table->string('facebook_id')->nullable();
            $table->string('identification_number')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('provider_token')->nullable();
            $table->string('remember_token')->nullable();
        });
    }
}