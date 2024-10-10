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
        Schema::table('payout_history', function (Blueprint $table) {
            $table->string('account_number')->after('bank_name');
            $table->string('card_holder_name')->after('account_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payout_history', function (Blueprint $table) {
            $table->dropColumn('account_number');
            $table->dropColumn('card_holder_name');
        });
    }
};
