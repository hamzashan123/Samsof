<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Video;
use App\Http\Resources\VideoResourceCollection;
use App\Http\Resources\VideoResource;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->get('paginate');

        $videos = Video::paginate(3);

        return new VideoResourceCollection($videos);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Video $video)
    {
        return new VideoResource($video);
    }
}
