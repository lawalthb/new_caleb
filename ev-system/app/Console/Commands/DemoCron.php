<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Student;
use Excel;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

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
            $name = "Eduvella-Autobackup-".date("d-m-Y");
            $data = Student::get()->toArray();
            $destinationPath = 'ev-assets/uploads/backups/';
            $file = Excel::create('student_'.$name, function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
            $sheet->fromArray($data);
            });
            })->store("csv",$path = $destinationPath,$returninfo = true);
        /*DB::table('items')->insert(['title' => 'hello new']);*/
        $this->info('Demo:Cron command run successfully');
    }
}
