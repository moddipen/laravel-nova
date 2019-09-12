<?php

namespace App\Http\Controllers\API\Event;

use App\Models\Event;
use App\Models\EventUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Event\EventResource;
use App\Http\Resources\Event\EventCollectionResource;

class EventController extends Controller
{
    /**
     * Display listing of upcoming or onGoing events.
     *
     * @param Request $request
     * @return EventCollectionResource
     */
    public function index(Request $request)
    {
        $events = Event::withCount('users')->where(function ($query) {
            $query->upcoming();
        })->orWhere(function ($query) {
            $query->current();
        })->get()->map(function ($event) {
            $event->users = $event->users()->take(5)->get();

            return $event;
        });

        return new EventCollectionResource($events);
    }

    /**
     * Display specified event resource.
     *
     * @param $id
     * @return EventResource|array
     */
    public function show($id)
    {
        $event = Event::with(['users' => function ($query) {
            $query->take(5);
        }, 'country', 'eventItems'])->withCount('users')->findOrFail($id);

        return new EventResource($event);
    }
}
