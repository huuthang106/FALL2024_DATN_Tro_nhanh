<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('account_locks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Khóa ngoại với bảng users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('lock_until')->nullable(); // Ngày hết hạn khóa tài khoản
            $table->text('lock_reason')->nullable(); // Lý do khóa tài khoản
            $table->tinyInteger('status')->default(1); // Trạng thái khóa (3: Bị khóa)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_locks');
    }
};
