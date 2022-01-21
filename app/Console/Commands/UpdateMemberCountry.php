<?php

namespace App\Console\Commands;

use App\Member;
use Illuminate\Console\Command;

class UpdateMemberCountry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'members:country';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all the country IDs on members';

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
        $members = Member::all();
        foreach ($members as $member) {
            $city = $member->city;
            if ($city && $city->country) {
                $this->info('Updating ' . $member->name . ' to country ' . $city->country->title);
                $member->update([
                    'country_id' => $city->country_id,
                ]);
            }
        }
    }
}
