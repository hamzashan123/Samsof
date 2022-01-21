<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CoverageResourceCollection;
use App\Coverage;
use App\Http\Resources\CoverageResource;

class CoverageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->get('paginate');

        $coverages = Coverage::orderBy('published_at', 'desc')->get();

        return new CoverageResourceCollection($coverages);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Coverage $coverage)
    {
        return new CoverageResource($coverage);
    }
}
