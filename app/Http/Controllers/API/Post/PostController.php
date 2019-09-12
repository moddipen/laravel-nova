<?php

namespace App\Http\Controllers\API\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Http\Resources\Post\PostCollectionResource;

class PostController extends Controller
{
    /**
     * @param Request $request
     * @return PostCollectionResource
     */
    public function index(Request $request)
    {
        $posts = Post::all();

        return new PostCollectionResource($posts);
    }

    /**
     * @param Post $post
     * @return PostResource
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }
}
