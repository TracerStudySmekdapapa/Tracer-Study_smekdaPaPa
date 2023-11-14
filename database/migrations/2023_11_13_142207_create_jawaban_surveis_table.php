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
        Schema::create('jawaban_survei', function (Blueprint $table) {
            $table->id();
            $table->string('jawaban');
            $table->foreignId('id_pertanyaan')->constrained('survei')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_user')->constrained('users', 'id_user')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('jawaban_survei');
    }
};
