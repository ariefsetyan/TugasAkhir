<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class everDay extends Command
{
    protected $signature = 'penjadwalan:update';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $tglnow=date('Y-m-d');
        $exthn = explode('-',$tglnow);
        $thn = $exthn[0];
        $datas = DB::table('dokumens as d')
            ->select('d.id','tgl_upload','aktif','inaktif','sifat_dokumen')
            ->join('j_r_a_s as jra','d.jenis_dok_jra','=','jra.id')
            ->get();
        foreach ($datas as $data){
            $tglupload = $data->tgl_upload;
            $extglupload = explode('-',$tglupload);
            $thnupload = $extglupload[0];
            $inttahun = (int)$thn;
            $intthnupload = (int)$thnupload;
            $aktif = (int)$data->aktif;
            $inaktif = (int)$data->inaktif;

            $thnaktif = $intthnupload+$aktif;
            $thninaktif = $intthnupload+$aktif+$inaktif;

            if ($thnaktif  < $inttahun){
                DB::table('dokumens')->where('id','=',$data->id)->update(['status' => 'aktif']);
            }elseif ($thninaktif > $inttahun){
                DB::table('dokumens')->where('id','=',$data->id)->update(['status' => 'inaktif']);
            }
            else{
                if ($data->sifat_dokumen == 'Musnah'){
                    DB::table('dokumens')->where('id','=',$data->id)->update(['status' => 'musnah']);
                }elseif ($data->sifat_dokumen == 'Ditinjau Ulang'){
                    DB::table('dokumens')->where('id','=',$data->id)->update(['status' => 'ditinjau ulang']);
                }elseif ($data->sifat_dokumen == 'permanen'){
                    DB::table('dokumens')->where('id','=',$data->id)->update(['status' => 'permanen']);
                }
            }
        }

        echo 'done';
    }
}
