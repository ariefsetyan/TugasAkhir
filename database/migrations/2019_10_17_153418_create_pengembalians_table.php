<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengembaliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_peminjaman');
            $table->unsignedBigInteger('id_dokumen');
            $table->unsignedBigInteger('id_pegawai');
            $table->timestamps();
            $table->foreign('id_peminjaman')->references('id')->on('peminjamen');
            $table->foreign('id_dokumen')->references('id')->on('dokumens');
            $table->foreign('id_pegawai')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengembalians');
    }
}
