<?php

namespace App\Console\Commands;

use App\Peminjaman;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class KembaliCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'done';

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
        $datas = Peminjaman::all();
        foreach ($datas as $data){
            if ($tglnow >= $data->tgl_kembali){
//                var_dump('asa');
                $update = DB::table('peminjamen')
                    ->where('id','=',$data->id)
                    ->update(['id_status' => '2']);

            }
        }

        echo 'done';

    }
}
