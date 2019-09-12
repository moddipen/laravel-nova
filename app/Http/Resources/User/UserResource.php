<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Event\EventCollectionResource;

class UserResource extends JsonResource
{
    protected $events;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $this->whenLoaded('events', function () {
            $this->events['past'] = new EventCollectionResource($this->getPastOrCurrentEvents($this->resource->events));
            $this->events['upcoming'] = new EventCollectionResource($this->getUpcomingEvents($this->resource->events));
            unset($this->resource->events);
            $this->resource->events = $this->events;
        });

        unset($this->resource->events);
        $this->resource->events = $this->events;

        return parent::toArray($this->resource);
    }

    protected function getUpcomingEvents($events)
    {
        return $events->filter(function ($event) {
            return $event->starting_at > now();
        })->values();
    }

    protected function getPastOrCurrentEvents($events)
    {
        return $events->filter(function ($event) {
            return $event->starting_at < now();
        })->values();
    }
}
