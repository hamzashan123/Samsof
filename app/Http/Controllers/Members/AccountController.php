<?php

namespace App\Http\Controllers\Members;

use App\City;
use App\Country;
use App\Hospital;
use App\Http\Controllers\Controller;
use App\Member;
use App\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function edit(Request $request)
    {
        return view('members.account', [
            'member' => $request->user()->load('hospitals', 'specialities'),
            'countries' => Country::orderBy('title')->get(),
            'cities' => City::orderBy('title')->get(),
            'hospitals' => Hospital::orderBy('title')->get(),
            'specialities' => Speciality::orderBy('title')->get(),
        ]);
    }

    public function update(Request $request)
    {
        $data = $this->validate($request, [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'membership_type' => ['required'],
            'email' => ['required', 'email', Rule::unique('members', 'email')->ignore($request->user('member')->id)],
            'practice_email' => ['nullable', 'email'],
            'telephone' => ['required'],
            'mobile' => ['nullable'],
            'alt_telephone' => ['nullable'],
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
            'new_country_title' => [Rule::requiredIf($request->get('country_id') === 'add-new')],
            'city_id' => ['nullable'],
            'new_city_title' => [Rule::requiredIf($request->get('city_id') === 'add-new')],
            'hospitals' => ['array', 'min:1'],
        ]);

        $member = $this->updateAccount($request, $data);

        return response()->json([
            'success' => true,
            'redirect' => $member->paid ? route('members.dashboard') : route('members.payments.index')
        ]);
    }

    protected function updateAccount(Request $request, array $data): Member
    {
        $member = $request->user();

        $member->update(Arr::except($data, ['hospitals']));

        $hospitals = $this->getHospitals($data['hospitals']);

        $member->hospitals()->sync($hospitals);

        return $member;
    }

    protected function getHospitals(array $data): array
    {
        return array_unique(array_map(static function ($hospital) {
            $id = Arr::get($hospital, 'id');

            if (strpos($id, 'new') === 0) {
                $h = Hospital::firstOrCreate(Arr::only($hospital, [
                    'city_id',
                    'title'
                ]));

                $id = $h->id;
            }

            return $id;

        }, $data));
    }
}
