<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeminjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('diskripsi');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->unsignedBigInteger('id_karyawan');
            $table->unsignedBigInteger('id_dokumen');
            $table->foreign('id_karyawan')->references('id')->on('users');
            $table->foreign('id_dokumen')->references('id')->on('dokumens');
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
        Schema::dropIfExists('peminjamen');
    }
}
