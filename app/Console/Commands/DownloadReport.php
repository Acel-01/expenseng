<?php

namespace App\Console\Commands;

use App\Scrapping;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DownloadReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DailyPaymentReport';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download excel files from scrapping through website';

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
        $link = new Scrapping();
        try {
            $result = $link->openTreasury('2020')->latest()->download();
            if ($result) {
                echo "downloaded to the resource folder \n";
            } else {
                echo "resource was not found \n";
            }
        } catch (\Exception $e) {
            $this->error('error occurred');
        }
        $link = new Scrapping();
        try {
            $result = $link->openTreasury('2020',Scrapping::monthlyBudgetPattern)->filterClassification(Scrapping::FGN)->latest()->download();
            if ($result) {
                echo "downloaded to the resource folder \n";
            } else {
                echo "resource was not found \n";
            }
        } catch (\Exception $e) {
            $this->error('error occurred');
        }

        return 0;
    }
}
