<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'snippet' => $this->snippet,
            'body' => $this->body,
            'is_sticky' => $this->is_sticky,
            'is_visible' => $this->is_visible,
            'is_video' => $this->is_video,
            'published_at' => $this->published_at,
            'unpublished_at' => $this->unpublished_at,
            'permalink' => $this->permalink,
            'image_src' => $this->image_src,
            'read_time_minutes' => rand(1, 10),
        ];
    }
}
