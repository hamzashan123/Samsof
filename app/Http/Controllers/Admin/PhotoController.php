<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Http\Requests\Photo\CreatePhotoRequest;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Constraint;
use App\Http\Requests\Photo\UpdatePhotoRequest;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::orderBy('id', 'desc')->paginate(9);

        return view('admin.photos.index', [
            'photos' => $photos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.photos.edit', [
            'photo' => null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePhotoRequest $request)
    {
        $data = $request->validated();

        $photo = Photo::create($data);

        $this->updateImage($photo, $request->get('image'));

        return redirect()->route('admin.photos.index')
            ->with('success', 'Photo Created');
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
    public function edit(Photo $photo)
    {
        return view('admin.photos.edit', [
            'photo' => $photo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePhotoRequest $request, Photo $photo)
    {
        $data = $request->validated();

        $photo->update($data);

        $this->updateImage($photo, $request->get('image'));

        return redirect()->route('admin.photos.index')
            ->with('success', 'Photo Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        Storage::disk('local')->delete('images/photos/' . $photo->id . '.jpg');

        $photo->delete();

        return redirect()->route('admin.photos.index')
            ->with('success', 'Photo Deleted');
    }

    protected function updateImage(Photo $photo, string $tempFilename = null)
    {
        if (!$tempFilename) {
            return;
        }

        $temp = explode('.', $tempFilename)[0];

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
        Storage::disk('local')->put('images/photos/' . $photo->id . '.jpg', $data);
    }
}
