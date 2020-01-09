<?php

namespace App\Console\Commands;

use App\Peminjaman;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class scheduleCommend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notif:notifEmail';

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
//        $now = date('y-m-d');
//        $datas = DB::table('peminjamen as p')
//            ->join('users as u','p.id_karyawan','=','u.id')
//            ->where('p.id_status','=','1');
//        foreach ($datas as $pinjam){
//            $namakaryawan= $pinjam->name;
//            $email= $pinjam->emial;
//            if ($pinjam->tgl_kembali <= $now){
//                $data = array('name'=>"Kepada Bapak Admin",
//                    "body" => "anda telah melewati batas waktu peminjaman mohon untuk dikmebalikan");
//                Mail::send('email.mail',$data,function ($message) use ($namakaryawan, $email) {
//                    $message->from('ariefsetyan@gmail.com',$namakaryawan);
//                    // $message->sender('john@johndoe.com', 'John Doe');
//                    $message->to($email,'Arief Setya');
//                    // $message->cc('john@johndoe.com', 'John Doe');
//                    // $message->bcc('john@johndoe.com', 'John Doe');
//                    $message->replyTo($email, 'John Doe');
//                    $message->subject('Permohonan Peminjaman Dokumen');
////            $message->priority(3);
//                    // $message->attach('pathToFile');
//                });
//            }
//        }

//        echo 'done';
    }
}
