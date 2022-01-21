<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Opinion;
use App\Http\Requests\Opinion\CreateOpinionRequest;
use App\Http\Requests\Opinion\UpdateOpinionRequest;
use App\Image;

class OpinionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opinions = Opinion::orderBy('id', 'desc')->paginate(10);

        return view('admin.opinions.index', [
            'opinions' => $opinions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = Image::orderBy('id', 'desc')->get();

        return view('admin.opinions.edit', [
            'opinion' => null,
            'images' => $images,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOpinionRequest $request)
    {
        $data = $request->validated();

        $opinion = Opinion::create($data);
        
        $this->updatePdf($opinion, $request->get('pdf'));

        return redirect()->route('admin.opinions.index')
            ->with('success', 'SASMFOS Opinion Created');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Opinion $opinion)
    {
        $images = Image::orderBy('id', 'desc')->get();

        return view('admin.opinions.edit', [
            'opinion' => $opinion,
            'images' => $images,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOpinionRequest $request, Opinion $opinion)
    {
        $data = $request->validated();

        $opinion->update($data);
        
        $this->updatePdf($opinion, $request->get('pdf'));

        return redirect()->route('admin.opinions.index')
            ->with('success', 'SASMFOS Opinion Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opinion $opinion)
    {
        $opinion->delete();

        return redirect()->route('admin.opinions.index')->with('success', 'SASMFOS Opinion Deleted');
    }

    protected function updatePdf(Opinion $opinion, $tempFilename = null)
    {
        $path = $this->getPdfDirectory($opinion);
        if ($tempFilename) {
            rename(
                storage_path('app/images/temp/' . $tempFilename),
                $path . $opinion->slug . '.pdf'
            );
        }
    }

    protected function getPdfDirectory(Opinion $opinion)
    {
        if (!file_exists($path = storage_path('app/images/opinions/'))) {
            mkdir($path);
        }
        return $path;
    }
}
