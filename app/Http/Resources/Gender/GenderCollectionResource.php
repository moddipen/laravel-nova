<?php

namespace App\Http\Resources\Gender;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GenderCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection = $this->collection->map(function ($item) {
            return new GenderResource($item);
        });

        return ['data' => $this->collection];
    }
}
