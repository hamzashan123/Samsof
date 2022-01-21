<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Images\CreateImageRequest;
use App\Image;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Constraint;
use Intervention\Image\ImageManager;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::orderBy('id', 'desc')->paginate(6);

        return view('admin.images.index', [
            'images' => $images
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.images.edit', [
            'image' => null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateImageRequest $request)
    {
        $data = $request->validated();

        $image = Image::Create($data);

        $this->updateImage($image, $request->get('image'));

        return redirect()->route('admin.images.index')->with('success', 'Image Uploaded');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        Storage::disk('local')->delete('images/image/' . $image->slug . '.jpg');
        $image->delete();
        return redirect()->route('admin.images.index')->with('success', 'Image Deleted');
    }

    protected function updateImage(Image $image, string $tempFilename = null)
    {
        if (!$tempFilename) {
            return;
        }

        $temp = explode('.', $tempFilename)[0];

        $imageManager = new ImageManager([
            'driver' => 'imagick'
        ]);

        $photo = $imageManager->make(Storage::disk('local')->get('images/temp/' . $temp));
        if ($photo->height() > 800) {
            $photo->heighten(800, function (Constraint $constraint) {
                $constraint->upsize();
            });
        }
        if ($photo->width() > 1000) {
            $photo->widen(1000, function (Constraint $constraint) {
                $constraint->upsize();
            });
        }

        $data = $photo->encode('jpg');
        Storage::disk('local')->put('images/image/' . $image->slug . '.jpg', $data);
    }
}
