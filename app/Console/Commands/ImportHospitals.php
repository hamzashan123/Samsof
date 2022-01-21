<?php

namespace App\Console\Commands;

use App\City;
use App\Hospital;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use League\Csv\Reader;

class ImportHospitals extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:hospitals {csv : the CSV file to import}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import hospitals from the CSV list';

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
        $csv = Reader::createFromPath($this->argument('csv'));
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);

        $records = $csv->getRecords([
            'title',
            'country_id',
            'city'
        ]);

        foreach ($records as $record) {

            $city = City::firstOrCreate([
                'title' => trim($record['city']),
                'country_id' => 1,
            ]);

            $hospital = Hospital::create([
                'title' => trim($record['title']),
                'city_id' => $city->id,
            ]);

            $this->info('Created '.$hospital->title);
        }
    }
}
