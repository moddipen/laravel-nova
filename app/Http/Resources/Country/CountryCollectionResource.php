<?php

namespace App\Http\Resources\Country;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CountryCollectionResource extends ResourceCollection
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
            return new CountryResource($item);
        });

        return ['data' => $this->collection];
    }
}
