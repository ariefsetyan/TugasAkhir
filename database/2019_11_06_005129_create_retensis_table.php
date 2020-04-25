<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retensis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->sting('kode_klasifikasi');
            $table->sting('nama');
            $table->sting('kurun_waktu');
            $table->sting('tingkat_perkembangan');
            $table->sting('media_arsip');
            $table->sting('kondisi');
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
        Schema::dropIfExists('retensis');
    }
}
