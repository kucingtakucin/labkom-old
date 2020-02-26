<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJasaInstallasiModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jasa_installasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mahasiswa');
            $table->unsignedBigInteger('no_hp');
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']);
            $table->date('tanggal');
            $table->string('laptop', 25);
            $table->text('spesifikasi');
            $table->string('kelengkapan', 50);
            $table->unsignedBigInteger('id_software');
            $table->string('install_ulang', 10);
            $table->text('lainlain');
            $table->timestamps();

            $table->foreign('id_software')->references('id_software')->on('software')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jasa_installasi_models');
    }
}
