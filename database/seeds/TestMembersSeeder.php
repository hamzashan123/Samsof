<?php

use App\Member;
use Illuminate\Database\Seeder;

class TestMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CitiesTableSeeder::class);
        $this->call(HospitalsTableSeeder::class);
        $this->call(SpecialitiesTableSeeder::class);

        $specialities = \App\Speciality::all();

        factory(Member::class)->create([
            'first_name' => 'Member',
            'last_name' => 'User',
            'email' => 'member@example.com',
        ])->specialities()->attach($specialities->random(2)->pluck('id')->toArray());

        factory(Member::class, 30)->create()->each(function (Member $member) use ($specialities) {
            $member->specialities()->attach($specialities->random(random_int(1,2))->pluck('id')->toArray());
        });
    }
}
