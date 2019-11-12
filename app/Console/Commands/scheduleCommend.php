<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class scheduleCommend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

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
//        $tglnow=date('Y-m-d');
//        $datas = DB::table('peminjamen')->select('tgl_kembali')->get();
//        foreach ($datas as $data){
//            if ($tglnow >= $data->tgl_kembali){
//                $update = DB::table('peminjamen')->update(['id_status' => '2']);
//            }
//        }
//        echo 'done';
    }
}
