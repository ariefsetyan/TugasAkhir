<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLokasiSimpansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasi_simpans', function (Blueprint $table) {
            $table->bigIncrements('id');
//            $table->string('no_takah');
            $table->string('gedung');
            $table->string('rak');
            $table->string('baris');
            $table->string('bok');
            $table->string('folder');
//            $table->foreign('no_takah')->references('no_takah')->on('jenis_dokumens');
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
        Schema::dropIfExists('lokasi_simpans');
//        Schema::dropIfExists('');
    }
}
