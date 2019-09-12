<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\Event\EventAttendeeResourceCollection;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::with(['country', 'businessCategories', 'events' => function ($query) {
            return $query->withCount('users');
        }])->find($id);
        $user->events = $user->events->map(function ($event) {
            $event->users = new EventAttendeeResourceCollection($event->users()->take(5)->get());

            return $event;
        });

        return new UserResource($user);
    }
}
