<?php

namespace App\Http\Controllers\Api;

use App\Member;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MemberResource;
use App\Http\Resources\MemberResourceCollection;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return MemberResourceCollection
     * @throws \Illuminate\Validation\ValidationException
     */
    public function index(Request $request)
    {
        $data = $this->validate($request, [
            'speciality' => ['sometimes', 'integer'],
            'hospital' => ['sometimes', 'integer'],
            'city' => ['sometimes', 'integer'],
            'filter' => ['sometimes', 'string'],
        ]);

        $members = Member::active()
            ->with('specialities', 'hospitals', 'city', 'city.country')
            ->where(function ($query) use ($data) {

            if ($speciality = Arr::get($data, 'speciality')) {
                $query->whereHas('specialities', function ($query) use ($speciality) {
                    $query->where('id', '=', $speciality);
                });
            }
            if ($hospital = Arr::get($data, 'hospitals')) {
                $query->whereHas('hospital', function ($query) use ($hospital) {
                    $query->where('id', '=', $hospital);
                });
            }
            if ($city = Arr::get($data, 'city')) {
                $query->where('city_id', '=', $city);
            }
        })
            ->where(function ($query) use ($data) {
                if ($filter = Arr::get($data, 'filter')) {

                    $query->where('first_name', 'like', '%'.$filter.'%')
                        ->orWhere('last_name', 'like', '%'.$filter.'%');
                }
            })
            ->orderBy('last_name')->orderBy('first_name')->get();

        return new MemberResourceCollection($members);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return MemberResource
     */
    public function show(Member $member)
    {
        return new MemberResource($member);
    }
}
