<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanAlatModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman_alat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']);
            $table->date('tanggal');
            $table->time('jam_pinjam');
            $table->time('jam_kembali');
            $table->unsignedBigInteger('id_alat');
            $table->tinyInteger('jumlah')->unsigned();
            $table->string('lama_peminjamanan', 10);
            $table->text('keperluan');
            $table->timestamps();

            $table->foreign('id_alat')->references('id_alat')->on('alat')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswa')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman_alat_models');
    }
}
