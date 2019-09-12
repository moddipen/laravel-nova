<?php

namespace App\Http\Resources\Event;

use App\Models\EventUser;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $eventUser = null;
        $eventUser = EventUser::where([
            'event_id' => $this->resource->id,
            'user_id' => auth()->check() ? auth()->user()->id : 1,
        ])->first();
        $this->resource->is_going = $eventUser ? 1 : 0;
        $this->resource->receive_updates = $eventUser ? $eventUser->receive_updates : 0;
        $this->resource->comment = $eventUser ? $eventUser->comment : null;

        return parent::toArray($this->resource);
    }
}
