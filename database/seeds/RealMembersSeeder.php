<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class RealMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('members:import', [
            'csv' => storage_path('app/members.csv')
        ]);
    }
}
