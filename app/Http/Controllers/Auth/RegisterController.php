<?php

namespace App\Http\Controllers\Auth;

use App\City;
use App\Country;
use App\Hospital;
use App\Http\Controllers\Controller;
use App\Member;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/app/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $countries = Country::orderBy('title')->get();
        $cities = City::orderBy('title')->get();
        $hospitals = Hospital::orderBy('title')->get();

        return view('auth.register', [
            'countries' => $countries,
            'cities' => $cities,
            'hospitals' => $hospitals,
        ]);
    }

    public function register(Request $request)
    {
        $data = $this->validator($request->all())->validate();

        $user = $this->create($data);
        $hospitals = $this->getHospitals($user, $request->get('hospitals'));

        $user->hospitals()->sync($hospitals);

        event(new Registered($user));

        return $this->registered($request, $user);
    }

    protected function getHospitals(Member $member, array $data)
    {
        return array_unique(array_map(static function ($hospital) {
            $id = Arr::get($hospital, 'id');

            if (strpos($id, 'new') === 0) {
                $h = Hospital::firstOrCreate(Arr::only($hospital, [
                    'city_id',
                    'title',
                ]));

                $id = $h->id;
            }

            return $id;
        }, $data));
    }

    protected function createHospital(Request $request)
    {
        $country = Country::find($request->get('country_id')) ?: null;
        if (!$country && $request->get('country_id') === 'add-new') {
            $country = Country::firstOrCreate(['title' => $request->get('new_country_title')]);
        }

        $city = $country->cities()->find($request->get('city_id')) ?: null;
        if (!$city && $request->get('city_id') === 'add-new') {
            $city = $country->cities()->firstOrCreate(['title' => $request->get('new_city_title')]);
        }

        $hospital = $city->hospitals()->find($request->get('hospital_id')) ?: null;
        if (!$hospital && $request->get('hospital_id') === 'add-new') {
            $hospital = $city->hospitals()->firstOrCreate(['title' => $request->get('new_hospital_title')]);
        }

        return [
            'country_id' => $country ? $country->id : null,
            'city_id' => $city ? $city->id : null,
            'hospital_id' => $hospital ? $hospital->id : null,
        ];
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'membership_type' => ['required'],
            'email' => ['required', 'email', Rule::unique('members', 'email')],
            'alt_email' => ['nullable', 'email'],
            'telephone' => ['required'],
            'mobile' => ['nullable'],
            'fax' => ['nullable'],
            'address' => ['required'],
            'alt_address' => ['nullable'],
            'id_number' => ['nullable'],
            'interests' => ['nullable', 'array'],
            'university' => ['required'],
            'hpcsa_year' => ['nullable', 'integer'],
            'hpcsa_number' => ['required'],
            'practice' => ['required'],
            'qualifications' => ['nullable', 'array'],
            'country_id' => ['nullable'],
            'new_country_title' => [Rule::requiredIf(Arr::get($data, 'country_id') === 'add-new')],
            'city_id' => ['nullable'],
            'new_city_title' => [Rule::requiredIf(Arr::get($data, 'city_id') === 'add-new')],
            'hospital_id' => ['nullable'],
            'new_hospital_title' => [Rule::requiredIf(Arr::get($data, 'hospital_id') === 'add-new')],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Member::create($data);
    }

    protected function registered(Request $request, $user)
    {
        return response()->json([
            'success' => true,
        ]);
    }
}
