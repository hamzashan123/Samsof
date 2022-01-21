<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::orderBy('title')->withCount('cities')->get();

        return view('admin.countries.index', [
            'countries' => $countries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.edit', [
            'country' => null,
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
            'title' => ['required', Rule::unique('countries', 'title')],
        ]);

        $country = Country::create($data);

        return redirect()->route('admin.countries.index')->with('success', 'Added country: ' . $country->title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('admin.countries.edit', [
            'country' => $country,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Country $country
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Country $country)
    {
        $data = $this->validate($request, [
            'title' => ['required', Rule::unique('countries', 'title')->ignore($country->id)],
        ]);

        $country->update($data);

        return redirect()->route('admin.countries.index')->with('success', $country->title . ' was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Country $country
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('admin.countries.index')->with('success', $country->title . ' was deleted');
    }
}
