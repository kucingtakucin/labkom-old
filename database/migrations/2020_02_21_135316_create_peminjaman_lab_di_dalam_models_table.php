<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanLabDiDalamModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman_lab_di_dalam', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']);
            $table->date('tanggal');
            $table->unsignedBigInteger('id_lab');
            $table->time('jam_pinjam');
            $table->time('jam_kembali');
            $table->unsignedBigInteger('id_dosen');
            $table->unsignedBigInteger('id_mata_kuliah');
            $table->text('keperluan');
            $table->timestamps();

            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswa')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('id_lab')->references('id_lab')->on('lab')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('id_dosen')->references('id_dosen')->on('dosen')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('id_mata_kuliah')->references('id_mata_kuliah')->on('mata_kuliah')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman_lab_di_dalam_models');
    }
}
