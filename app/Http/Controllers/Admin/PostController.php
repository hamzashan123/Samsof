<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Constraint;
use Intervention\Image\ImageManager;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->orderBy('id', 'desc')->paginate(10);

        return view('admin.posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $date = date('Y-m-d H:i:s');

        return view('admin.posts.edit', [
            'post' => null,
            'categories' => $categories,
            'date' => $date,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $data = $request->validated();

        $post = Post::create($data);

        $this->updateImage($post, $request->get('image'));

        return redirect()->route('admin.posts.index')->with('success', 'post Created');
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
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        
        $post->update($data);

        $this->updateImage($post, $request->get('image'));

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post Deleted');
    }

    protected function updateImage(Post $post, string $tempFilename = null)
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
        Storage::disk('local')->put('images/posts/' . $post->id . '/post.jpg', $data);
    }
}
