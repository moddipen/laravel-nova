<?php

namespace App\Http\Controllers\API\Event;

use App\Models\Event;
use App\Models\EventUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Event\EventAttendeeResourceCollection;

class EventAttendeesController extends Controller
{
    /**
     * List all users going to an event.
     *
     * @param Event $event
     * @return EventAttendeeResourceCollection
     */
    public function index(Event $event)
    {
        $users = $event->users;

        return new EventAttendeeResourceCollection($users);
    }

    /**
     * Register a user to an event.
     *
     * @param Event $event
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Event $event)
    {
        EventUser::firstOrCreate([
            'event_id' => $event->id,
            'user_id' => Auth::check() ? Auth::user()->id : 1,
        ]);

        return response()->json(null, 204);
    }
}
