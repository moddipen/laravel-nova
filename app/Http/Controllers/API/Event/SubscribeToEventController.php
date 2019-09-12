<?php

namespace App\Http\Controllers\API\Event;

use App\Models\Event;
use App\Models\EventUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubscribeToEventController extends Controller
{
    /**
     * Set receive_updates 0/1 for specific event.
     *
     * @param Request $request
     * @param Event $event
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, Event $event)
    {
        EventUser::where([
            'event_id' => $event->id,
            'user_id' => Auth::check() ? Auth::user()->id : 1,
        ])->update([
            'receive_updates' => $request->get('receive_updates', 0),
        ]);

        return response()->json(null, 204);
    }
}
