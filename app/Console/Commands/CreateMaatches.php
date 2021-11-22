<?php

namespace App\Console\Commands;

use App\Models\Team;
use App\Models\Maatch;
use Illuminate\Console\Command;

class CreateMaatches extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maatches:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a random result';

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
     * @return int
     */
    public function handle()
    {

        $maatch = new Maatch();
        $result1 = rand(0, 10);
        $result2 = rand(0, 10);
        $maatch->team1_id = rand(1, 3);
        $maatch->team2_id = rand(1, 3);
        $maatch->date = date('Y-m-d H:i:s');
        $maatch->result =  $result1 . ' : ' . $result2;

        if ($maatch->save()) {
            $this->info('Result created!!');
        } else {
            $this->error('Error!!');
        }
    }
}
