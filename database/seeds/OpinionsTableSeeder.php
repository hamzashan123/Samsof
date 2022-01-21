<?php

use Illuminate\Database\Seeder;
use App\Opinion;

class OpinionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Opinion::class, 12)->create();
    }
}
