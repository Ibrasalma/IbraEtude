<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Message;


class Clean extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Showing the user';

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
        $bar = $this->output->createProgressBar(10);

        $bar->start();

        for ($i = 1; $i <=10 ; $i++) {
            sleep(1);
            $bar->advance();
        }

        $bar->finish();
    }
}
