<?php

namespace App\Console\Commands;

use App\City;
use App\Country;
use App\Member;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class GeocodeMembers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'members:geocode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Geocode the addresses for all members';

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
            $this->output->write('Geocoding ' . $member->name . '... ');
            $coords = $this->geocode($member);

            $location = null;
            if ($coords && $coords['results'] && count($coords['results'])) {
                $location = $coords['results'][0]['geometry']['location'];
            };

            if (!$location) {
                $this->output->writeln('[<error>FAILED</error>]');
            } else {

                $localityName = $this->getLocalityName($coords);
                $country = null;
                $city = null;
                if ($localityName) {
                    $countryName = $this->getCountryName($coords);

                    $country = Country::firstOrCreate(['title' => $countryName]);

                    $city = City::firstOrCreate([
                        'title' => $localityName,
                        'country_id' => $country->id
                    ]);
                }

                $member->update([
                    'coordinates' => [
                        'lat' => $location['lat'],
                        'long' => $location['lng'],
                    ],
                    'country_id' => $country ? $country->id : null,
                    'city_id' => $city ? $city->id : null,
                ]);
                $this->output->writeln('[<info>OK</info>]');
            }
        }
    }

    protected function getLocalityName(array $coords)
    {
        foreach (Arr::get($coords, 'results.0.address_components') as $component) {
            if (in_array('locality', $component['types'], true)) {
                return $component['long_name'];
            }
        }

        return null;
    }

    protected function getCountryName(array $coords)
    {
        foreach (Arr::get($coords, 'results.0.address_components') as $component) {
            if (in_array('country', $component['types'], true)) {
                return $component['long_name'];
            }
        }

        return null;
    }

    protected function geocode(Member $member)
    {
        if (!$member->physical_address) {
            return null;
        }
        $client = new Client();

        $response = $client->get('https://maps.googleapis.com/maps/api/geocode/json', [
            'query' => [
                'address' => $member->physical_address,
                'key' => config('services.google.cloud.key'),
            ]
        ]);

        if (!$response->getStatusCode()) {
            return false;
        }

        return json_decode((string)$response->getBody(), true);
    }
}
