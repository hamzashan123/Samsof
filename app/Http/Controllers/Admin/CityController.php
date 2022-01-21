<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::orderBy('title')->with('country')->withCount('members', 'hospitals')->get();

        return view('admin.cities.index', [
            'cities' => $cities,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities.edit', [
            'countries' => Country::orderBy('title')->get(),
            'city' => null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'country_id' => ['required'],
            'title' => [
                'required',
                Rule::unique('cities', 'title')
                    ->where('country_id', $request->get('country_id'))
            ],
        ]);

        $city = City::create($data);

        return redirect()->route('admin.cities.index')->with('success', 'Created city: ' . $city->title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('admin.cities.edit', [
            'countries' => Country::orderBy('title')->get(),
            'city' => $city,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\City $city
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, City $city)
    {
        $data = $this->validate($request, [
            'country_id' => ['required'],
            'title' => [
                'required',
                Rule::unique('cities', 'title')
                    ->where('country_id', $request->get('country_id'))
                    ->ignore($city->id)
            ]
        ]);

        $city->update($data);

        return redirect()->route('admin.cities.index')->with('success', $city->title . ' was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\City $city
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('admin.cities.index')->with('success', $city->title . ' was deleted');
    }
}
