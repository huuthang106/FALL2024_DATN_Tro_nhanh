<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
        * Run the migrations.
        *
        * @return void
        */
        public function up()
        {
            Schema::table('zones', function (Blueprint $table) {
                $table->dropColumn(['vip_expiry_date', 'type_vip']);
            });
        }
 
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::table('zones', function (Blueprint $table) {
                $table->dateTime('vip_expiry_date')->nullable();
                $table->integer('type_vip')->default(0);
            });
        }
};
