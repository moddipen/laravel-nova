<?php

namespace App\Http\Controllers\API\Event;

use App\Models\Event;
use App\Models\EventItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventItem\EventItemResource;
use App\Http\Resources\EventItem\EventItemCollectionResource;

class EventItemController extends Controller
{
    public function index(Event $event)
    {
        $eventsItems = $event->eventItems;

        return new EventItemCollectionResource($eventsItems);
    }
}
