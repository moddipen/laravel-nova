<?php

use App\Models\User;
use App\Models\Event;
use App\Models\EventItem;
use App\Models\EventUser;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Event::class, 30)->create([

        ])->each(function ($event) {
            /*
             * Attach event items
             */

            $items = Arr::random([3, 4, 5, 6, 7, 8]);

            factory(EventItem::class, $items)->create([
                'event_id' => $event->id,
            ]);
        })->each(function ($event) {
            /*
             * Add a random amount of users users
             */
            $users = Arr::random([3, 4, 5, 6, 7, 8]);

            for ($i = 0; $i < $users; $i++) {
                factory(EventUser::class, 1)->create([
                    'event_id' => $event->id,
                    'user_id' => $i + 1,
                ]);
            }
        });
    }
}
