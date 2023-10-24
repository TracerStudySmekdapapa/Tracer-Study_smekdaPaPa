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
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->id('id_pendidikan');
            $table->string('nama_univ', 25)->nullable();
            $table->string('fakultas', 25)->nullable();
            $table->string('prodi', 25)->nullable();
            $table->text('alamat_univ')->nullable();
            $table->foreignId('id_pribadi')->constrained('data_pribadi', 'id_pribadi')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pendidikan');
    }
};
