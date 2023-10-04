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
        Schema::create('alumni', function (Blueprint $table) {
            $table->id('id_alumni');
            $table->string('nisn', 11)->nullable();
            $table->string('no_telp', 13)->nullable();
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir', 10)->nullable();
            $table->string('agama', 10)->nullable();
            $table->string('jenis_kelamin', 10)->nullable();
            $table->string('jurusan', 5)->nullable();
            $table->string('tamatan', 4)->nullable();
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
        Schema::dropIfExists('alumni');
    }
};
