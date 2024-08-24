<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('notifications', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('registration_list_id')->nullable(); // Thay 'existing_column' bằng tên cột hiện có sau đó

            // Thêm khóa ngoại cho cột registration_list_id
            $table->foreign('registration_list_id')
                ->references('id')
                ->on('registration_lists')
                ->onDelete('set null'); // Xóa tham chiếu và đặt giá trị thành null khi bản ghi bị xóa
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notifications', function (Blueprint $table) {
            // Xóa khóa ngoại và cột registration_list_id
            $table->dropForeign(['registration_list_id']);
            $table->dropColumn('registration_list_id');
        });
    }
};
