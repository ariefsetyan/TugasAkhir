<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_dokumen');
            $table->string('diskripsi');
            $table->string('kurun_waktu');
            $table->string('tingkat_perkembangan');
            $table->string('media_arsip');
            $table->string('kondisi');
            $table->string('file');
            $table->string('no_takah');
            $table->unsignedBigInteger('jenis_dok_jra');
            $table->foreign('no_takah')->references('no_takah')->on('jenis_dokumens');
            $table->foreign('jenis_dok_jra')->references('id')->on('j_r_a_s');
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
        Schema::dropIfExists('dokumens');
    }
}
