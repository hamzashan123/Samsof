<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Http\Resources\PhotoResourceCollection;
use App\Http\Resources\PhotoResource;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->get('paginate');

        $photos = Photo::paginate(3);

        return new PhotoResourceCollection($photos);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Photo $photo)
    {
        return new PhotoResource($photo);
    }
}
