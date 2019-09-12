<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventItem extends Model
{
    protected $fillable = [
        'name',
        'starting_at',
        'ending_at',
        'event_id',
    ];

    protected $casts = [
        'starting_at' => 'date',
        'ending_at' => 'date',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
