<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumens';
    protected $fillable = ['diskripsi','kurun_waktu','tingkat_perkembangan','media_arsip','kondisi','file','kode_dokumen','jenis_dokumen'];

    public function getUkuranAttribute($value)
    {
        return number_format($value / 10000, 1);
    }
}
