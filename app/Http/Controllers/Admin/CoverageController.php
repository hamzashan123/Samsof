<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coverage;
use App\Http\Requests\Coverages\CreateCoverageRequest;
use Intervention\Image\Constraint;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use App\Image;

class CoverageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coverages = Coverage::orderBy('id', 'desc')->paginate(10);

        return view('admin.coverages.index', [
            'coverages' => $coverages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = date('Y-m-d H:i:s');
        $images = Image::orderBy('id', 'desc')->get();

        return view('admin.coverages.edit', [
            'coverage' => null,
            'date' => $date,
            'images' => $images,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCoverageRequest $request)
    {
        $data = $request->validated();

        $coverage = Coverage::create($data);

        $this->updateImage($coverage, $request->get('image'));

        return redirect()->route('admin.coverages.index')
            ->with('sccess', 'Media Coverage Created');
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
    public function edit(Coverage $coverage)
    {
        $images = Image::orderBy('id', 'desc')->get();

        return view('admin.coverages.edit', [
            'coverage' => $coverage,
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
    public function update(UpdateCategoryRequest $request, Coverage $coverage)
    {
        $data = $request->validated();

        $coverage->update($data);

        $this->updateImage($coverage, $request->get('image'));

        return redirect()->route('admin.coverages.index')
            ->with('sccess', 'Media Coverage Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coverage $coverage)
    {
        $coverage->delete();

        return redirect()->route('admin.coverages.index')
            ->with('sccess', 'Media Coverage Deleted');
    }

    public function updateImage(Coverage $coverage, string $tempFilename = null)
    {
        if (!$tempFilename) {
            return;
        }

        $temp = explode('.', $tempFilename) [0];

        $imageManager = new ImageManager([
            'driver' => 'imagick'
        ]);

        $image = $imageManager->make(Storage::disk('local')->get('images/temp/' . $temp));
        if ($image->height() > 800) {
            $image->heighten(800, function (Constraint $constraint) {
                $constraint->upsize();
            });
        }
        if ($image->width() > 1000) {
            $image->widen(1000, function (Constraint $constraint) {
                $constraint->upsize();
            });
        }

        $data = $image->encode('jpg');
        Storage::disk('local')->put('images/coverages/' . $coverage->id . '/cover.jpg', $data);
    }
}
