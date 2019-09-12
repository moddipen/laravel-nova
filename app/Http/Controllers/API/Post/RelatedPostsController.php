<?php

namespace App\Http\Controllers\API\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostCollectionResource;

class RelatedPostsController extends Controller
{
    /**
     * @param Post $post
     * @return PostCollectionResource
     */
    public function __invoke(Post $post)
    {
        $posts = Post::all()->random(5);

        return new PostCollectionResource($posts);
    }
}
