<?php

namespace App\Console\Commands;

use App\Hospital;
use Illuminate\Console\Command;

class UpdateHospitalCity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:hospitals';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the City associated with the Hospitals';

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
        foreach (Hospital::all() as $hospital) {
            $member = $hospital->members()->first();

            if ($member && $member->city) {
                $this->info('Updating the ' . $hospital->title . ' city as ' . $member->city->title);
                $hospital->update(['city_id' => $member->city_id]);
            }
        }
    }
}
