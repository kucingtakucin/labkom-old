<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJasaPrintModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jasa_print', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('keterangan_print', ['berwarna', 'hitam_putih']);
            $table->integer('lembar');
            $table->date('tanggal');
            $table->text('lainlain');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jasa_print_models');
    }
}
