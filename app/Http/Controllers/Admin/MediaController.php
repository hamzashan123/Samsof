<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Media;
use App\Http\Requests\Medias\CreateMediaRequest;
use App\Http\Requests\Medias\UpdateMediaRequest;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Constraint;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::orderBy('id', 'desc')->paginate(10);

        return view('admin.medias.index', [
            'medias' => $medias,
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

        return view('admin.medias.edit', [
            'media' => null,
            'date' => $date,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMediaRequest $request)
    {
        $data = $request->validated();

        $media = Media::create($data);

        $this->updateImage($media, $request->get('image'));
        $this->updatePdf($media, $request->get('pdf'));

        return redirect()->route('admin.medias.index')->with('success', 'Media Created');
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
    public function edit(Media $media)
    {
        return view('admin.medias.edit', [
            'media' => $media,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMediaRequest $request, Media $media)
    {
        $data = $request->validated();
        
        $media->update($data);

        $this->updateImage($media, $request->get('image'));
        $this->updatePdf($media, $request->get('pdf'));

        return redirect()->route('admin.medias.index')
            ->with('success', 'Media Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        $media->delete();

        return redirect()->route('admin.medias.index')
            ->with('success', 'Media Deleted');
    }
    
    protected function updateImage(Media $media, string $tempFilename = null)
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
        Storage::disk('local')->put('images/media/' . $media->id . '/media.jpg', $data);
    }



    protected function updatePdf(Media $media, $tempFilename = null)
    {
        $path = $this->getPdfDirectory($media);
        if ($tempFilename) {
            rename(
                storage_path('app/images/temp/' . $tempFilename),
                $path . '/document.pdf'
            );
        }
    }

    protected function getPdfDirectory(Media $media)
    {
        if (!file_exists($path = storage_path('app/images/media/' . $media->id))) {
            mkdir($path);
        }
        return $path;
    }
}
