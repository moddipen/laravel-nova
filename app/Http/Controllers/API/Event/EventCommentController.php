<?php

namespace App\Http\Controllers\API\Event;

use App\Models\Event;
use App\Models\EventUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Event\EventCommentRequest;

class EventCommentController extends Controller
{
    public function __invoke(Event $event, EventCommentRequest $request)
    {
        EventUser::where([
            'event_id' => $event->id,
            'user_id' => Auth::check() ? Auth::user()->id : 1,
        ])->update(['comment' => $request->get('comment')]);

        return response()->json(null, 204);
    }
}
