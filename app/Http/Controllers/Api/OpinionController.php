<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Opinion;
use App\Http\Resources\OpinionResourceCollection;
use App\Http\Resources\OpinionResource;
use Barryvdh\DomPDF\Facade as PDF;

/**
 * Class OpinionController
 * @package App\Http\Controllers\Api
 */
class OpinionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return OpinionResourceCollection
     */
    public function index(Request $request)
    {
        $perPage = $request->get('paginate');

        $opinions = Opinion::orderBy('created_at', 'desc')->paginate(3);

        return new OpinionResourceCollection($opinions);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Opinion $opinion
     * @return OpinionResource
     */
    public function show(Request $request, Opinion $opinion)
    {
        return new OpinionResource($opinion);
    }

    /**
     * @param Request $request
     * @param Opinion $opinion
     * @return mixed
     */
    public function pdf(Request $request, Opinion $opinion)
    {
        $data = Opinion::where('id', $opinion->id)->first();

        $pdf = PDF::loadView('pdf.download', [
            'data' => $data
        ]);

        return $pdf->download($data->title . '.pdf');
    }
}
