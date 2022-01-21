<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Hospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals = Hospital::orderBy('title')->with('city')->withCount('members')->paginate();

        return view('admin.hospitals.index', [
            'hospitals' => $hospitals,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::orderBy('title')->get();

        return view('admin.hospitals.edit', [
            'cities' => $cities,
            'hospital' => null,
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
            'city_id' => ['nullable', Rule::exists('cities', 'id')],
            'title' => 'required',
        ]);

        $hospital = Hospital::create($data);

        return redirect()->route('admin.hospitals.index')->with('success', 'Created new hospital: ' . $hospital->title);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Hospital $hospital
     * @return void
     */
    public function edit(Hospital $hospital)
    {
        $cities = City::orderBy('title')->get();

        return view('admin.hospitals.edit', [
            'hospital' => $hospital,
            'cities' => $cities,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Hospital $hospital)
    {
        $data = $this->validate($request, [
            'city_id' => ['nullable', Rule::exists('cities', 'id')],
            'title' => 'required',
        ]);

        $hospital->update($data);

        return redirect()->route('admin.hospitals.index')->with('success', 'Updated ' . $hospital->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
