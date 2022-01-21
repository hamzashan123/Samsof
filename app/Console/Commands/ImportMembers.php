<?php

namespace App\Console\Commands;

use App\City;
use App\Member;
use App\Region;
use App\Country;
use App\Hospital;
use App\Speciality;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use League\Csv\Reader;
use Illuminate\Console\Command;

class ImportMembers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:members {csv}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import the Members CSV list';

    protected $emails = [];

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
        if (!file_exists($this->argument('csv'))) {
            $this->error('File not found.');
            exit(1);
        }

        foreach ($this->getRecords() as $record) {
            $member = $this->importMember($record);

            $this->info('Create member: '.$member->name);
        }
    }

    protected function getRecords()
    {
        ini_set('auto_detect_line_endings', '1');

        $csv = Reader::createFromPath($this->argument('csv'));
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);

        return $csv->getRecords([
            'paid',
            'first_name',
            'last_name',
            'email',
            'alt_email',
            'mobile',
            'telephone',
            'fax',
            'physical_address',
        ]);
    }

    protected function importMember(array $record): Member
    {
        $data = array_map(function ($i) {
            return trim($i) ?: null;
        }, Arr::except($record, [
            'paid',
        ]));

        $data['payment_at'] = $record['paid'] ? Carbon::create(2020, 1, 1) : null;
        $data['published'] = trim($record['paid']) === 'Y';

        return Member::create($data);
    }
}
