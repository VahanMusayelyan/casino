<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Jackpot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jackpot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add jackpot';

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
        $randNumb = rand(1,9)/1000;
        $jackpotAdd = DB::table('other_settings')->where("settings_name","=","jackpot")->first();
        $randNumb = $randNumb + (float)$jackpotAdd->value;

        if($randNumb > 20){
            $randNumb = 0.001;
        }

        DB::table('other_settings')->where("settings_name","=","jackpot")->update([
            "value" => $randNumb
        ]);

    }
}
