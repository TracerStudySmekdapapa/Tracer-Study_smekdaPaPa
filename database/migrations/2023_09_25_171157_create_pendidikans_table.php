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
            $table->uuid('id_pendidikan');
            $table->string('nama_univ', 50)->nullable();
            $table->string('fakultas', 25)->nullable();
            $table->string('prodi', 50)->nullable();
            $table->text('alamat_univ')->nullable();
            $table->uuid('id_pribadi')->foreignId('id_pribadi')->constrained('data_pribadi', 'id_pribadi')->onDelete('cascade')->onUpdate('cascade');
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
