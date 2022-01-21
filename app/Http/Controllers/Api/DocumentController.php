<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Document;
use App\Http\Resources\DocumentResourceCollection;
use App\Http\Resources\DocumentResource;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->get('paginate');

        $documents = Document::paginate(3);

        return new DocumentResourceCollection($documents);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Document $document)
    {
        return new DocumentResource($document);
    }
}
