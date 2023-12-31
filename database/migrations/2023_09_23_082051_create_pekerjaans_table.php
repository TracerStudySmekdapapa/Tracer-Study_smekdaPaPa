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
        Schema::create('pekerjaan', function (Blueprint $table) {
            $table->uuid('id_pekerjaan');
            $table->string('nama_pekerjaan', 50)->nullable();
            $table->string('nama_instansi', 50)->nullable();
            $table->text('alamat_instansi')->nullable();
            $table->string('jabatan', 50)->nullable();
            $table->string('thn_masuk', 4)->nullable();
            $table->string('thn_keluar', 4)->nullable();
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
        Schema::dropIfExists('pekerjaan');
    }
};
