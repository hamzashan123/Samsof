<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Release;
use App\Http\Resources\ReleaseResourceCollection;
use App\Http\Resources\ReleaseResource;
use Barryvdh\DomPDF\Facade as PDF;

class ReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return PostResourceCollection
     */
    public function index(Request $request)
    {
        $perPage = $request->get('paginate');

        $releases = Release::orderBy('published_at', 'desc')->get();

        return new ReleaseResourceCollection($releases);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Release $release)
    {
        return new ReleaseResource($release);
    }

    public function pdf(Request $request, Release $release)
    {
        $data = Release::where('id', $release->id)->first();

        $pdf = PDF::loadView('pdf.download', [
            'data' => $data
        ]);

        return $pdf->download($data->title . '.pdf');
    }
}
