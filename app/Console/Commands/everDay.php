<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class everDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'penjadwalan:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tglnow=date('Y-m-d');
        $exthn = explode('-',$tglnow);
        $thn = $exthn[0];
        $datas = DB::table('dokumens as d')
            ->select('d.id','tgl_upload','aktif','inaktif','sifat_dokumen')
            ->join('j_r_a_s as jra','d.jenis_dok_jra','=','jra.id')
            ->get();
//        dd($thn,$datas);
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
//            dd($thnaktif);
//            dd($thninaktif);
            if ($thnaktif  > $inttahun){
                DB::table('dokumens')->where('id','=',$data->id)->update(['status' => 'aktif']);
//                var_dump( 'Aktif');
            }elseif ($thninaktif > $inttahun){
                DB::table('dokumens')->where('id','=',$data->id)->update(['status' => 'inaktif']);
//                var_dump( 'Inaktif');
            }
//            elseif ($inttahun > $thninaktif){
            else{
//                var_dump('tes');
                if ($data->sifat_dokumen == 'Musnah'){
                    DB::table('dokumens')->where('id','=',$data->id)->update(['status' => 'musnah']);
//                    var_dump( 'Musnah');
                }elseif ($data->sifat_dokumen == 'Ditinjau Ulang'){
                    DB::table('dokumens')->where('id','=',$data->id)->update(['status' => 'ditinjau ulang']);
//                    var_dump( 'Ditinjau Ulang');
                }elseif ($data->sifat_dokumen == 'permanen'){
                    DB::table('dokumens')->where('id','=',$data->id)->update(['status' => 'permanen']);
                }
            }
        }

        echo 'done';
    }
}
