<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilities', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('wifi');
            $table->integer('bathrooms');
            $table->integer('air_conditioning');
            $table->tinyInteger('garage');
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade');
            $table->timestamps(); // Tự động thêm created_at và updated_at
            $table->softDeletes(); // Tự động thêm deleted_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilities');
    }
}
