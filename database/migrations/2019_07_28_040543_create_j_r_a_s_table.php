<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJRASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('j_r_a_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nm_jenis_jra');
            $table->string('aktif');
            $table->string('inaktif');
            $table->string('sifat_dokumen');
            $table->string('kode_jenis');
            $table->foreign('kode_jenis')->references('no_takah')->on('jenis_dokumens');
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
        Schema::dropIfExists('j_r_a_s');
    }
}
