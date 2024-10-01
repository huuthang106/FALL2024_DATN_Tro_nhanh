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
        Schema::table('users', function (Blueprint $table) {
            // Kiểm tra xem cột đã tồn tại chưa trước khi thêm
            if (!Schema::hasColumn('users', 'bank_name')) {
                $table->string('bank_name')->after('name')->nullable();
            }
            if (!Schema::hasColumn('users', 'bank_account')) {
                $table->string('bank_account')->after('bank_name')->nullable();
            }
            if (!Schema::hasColumn('users', 'card_holder_name')) {
                $table->string('card_holder_name')->after('bank_account')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['bank_name', 'bank_account', 'card_holder_name']);
        });
    }
};
