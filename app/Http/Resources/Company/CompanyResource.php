<?php

namespace App\Http\Resources\Company;

use App\Http\Resources\Country\CountryResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User\UserResourceCollection;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'website' => $this->website,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'post_code' => $this->post_code,
            'image_src' => $this->image_src,
            'country' => CountryResource::make($this->country),
            'users_count' => $this->when(isset($this->users_count), $this->users_count),
            'users' => new UserResourceCollection($this->whenLoaded('users')),
        ];
    }
}
