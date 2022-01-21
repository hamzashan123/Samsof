<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Release;
use App\Http\Requests\Release\CreateReleaseRequest;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Constraint;
use App\Http\Requests\Release\UpdateReleaseRequest;
use App\Image;

class ReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $releases = Release::orderBy('id', 'desc')->paginate(10);
        
        return view('admin.releases.index', [
            'releases' => $releases
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

        return view('admin.releases.edit', [
            'release' => null,
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
    public function store(CreateReleaseRequest $request)
    {
        $data = $request->validated();

        $release = Release::create($data);

        $this->updateImage($release, $request->get('image'));
        $this->updatePdf($release, $request->get('pdf'));

        return redirect()->route('admin.releases.index')
            ->with('sccess', 'Media Release Created');
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
    public function edit(Release $release)
    {
        $images = Image::orderBy('id', 'desc')->get();

        return view('admin.releases.edit', [
            'release' => $release,
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
    public function update(UpdateReleaseRequest $request, Release $release)
    {
        $data = $request->validated();

        $release->update($data);

        $this->updateImage($release, $request->get('image'));
        $this->updatePdf($release, $request->get('pdf'));

        return redirect()->route('admin.releases.index')
            ->with('sccess', 'Media Release Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Release $release)
    {
        $release->delete();

        return redirect()->route('admin.releases.index')
            ->with('sccess', 'Media Release Deleted');
    }

    public function updateImage(Release $release, string $tempFilename = null)
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
        Storage::disk('local')->put('images/releases/' . $release->id . '/cover.jpg', $data);
    }

    protected function updatePdf(Release $release, $tempFilename = null)
    {
        $path = $this->getPdfDirectory($release);
        if ($tempFilename) {
            rename(
                storage_path('app/images/temp/' . $tempFilename),
                $path . '/document.pdf'
            );
        }
    }

    protected function getPdfDirectory(Release $release)
    {
        if (!file_exists($path = storage_path('app/images/releases/' . $release->id))) {
            mkdir($path);
        }
        return $path;
    }
}
