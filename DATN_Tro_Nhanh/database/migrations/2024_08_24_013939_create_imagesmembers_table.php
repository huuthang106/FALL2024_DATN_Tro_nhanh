<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesmembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagesmembers', function (Blueprint $table) {
            $table->id(); // Thay thế 'filename' bằng 'id' làm khóa chính tự tăng
            $table->string('filename');
            $table->foreignId('memberregistration_id')->constrained('registration_lists')->onDelete('cascade'); // Thay thế 'memberregistration_id' với khóa ngoại liên kết với 'memberregistrations'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagesmembers');
    }
}
