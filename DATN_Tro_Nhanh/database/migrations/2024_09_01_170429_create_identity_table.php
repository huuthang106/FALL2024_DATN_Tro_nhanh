<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentityTable extends Migration
{
    public function up()
    {
        Schema::create('identity', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('identification_number');
            $table->boolean('gender')->default(1);
            $table->boolean('status')->default('1');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();

           
        });
    }

    public function down()
    {
        Schema::dropIfExists('identity');
    }
}
