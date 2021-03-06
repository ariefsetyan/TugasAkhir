<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_dokumens', function (Blueprint $table) {
            $table->string('no_takah');
            $table->unsignedBigInteger('id_lokasi');
            $table->string('kode_jenis');
            $table->string('nama_jenis');
            $table->primary('no_takah');
            $table->foreign('id_lokasi')->references('id')->on('lokasi_simpans');
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
        Schema::dropIfExists('jenis_dokumens');
    }
}
