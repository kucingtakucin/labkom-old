<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->bigIncrements('id_mahasiswa');
            $table->string('nama_mahasiswa', 50);
            $table->enum('jenis_kelamin_mahasiswa', ['Laki-laki', 'Perempuan']);
            $table->string('nim_mahasiswa', 10);
            $table->string('kelas_mahasiswa', 5);
            $table->unsignedBigInteger('id_prodi');
            $table->unsignedBigInteger('id_angkatan');

            $table->foreign('id_angkatan')->references('id_angkatan')->on('angkatan')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('id_prodi')->references('id_prodi')->on('program_studi')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa_models');
    }
}
