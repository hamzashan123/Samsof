<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostResourceCollection;

/**
 * Class PostController
 * @package App\Http\Controllers\Api
 */
class PostController extends Controller
{
    /**
     * Get all posts
     *
     * @param Request $request
     * @return PostResourceCollection
     */
    public function index(Request $request)
    {
        $perPage = $request->get('paginate');
        $categoryId = $request->get('category');

        $posts = Post::with('category')->where(function ($query) use ($categoryId) {
            if ($categoryId) {
                $query->where('category_id', '=', $categoryId);
            }
        })->paginate($perPage);
        
        return new PostResourceCollection($posts);
    }

    /**
     * Get a specific post
     *
     * @param Request $request
     * @param Post $post
     * @return PostResource
     */
    public function show(Request $request, Post $post)
    {
        return new PostResource($post);
    }
}
