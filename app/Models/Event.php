<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'description',
        'venue',
        'address',
        'city',
        'state',
        'post_code',
        'starting_at',
        'ending_at',
        'image_src',
        'country_id',
    ];

    protected $casts = [
        'starting_at' => 'date',
        'ending_at' => 'date',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->select('users.id', 'image_src', 'first_name', 'last_name')->orderBy('event_user.id', 'desc');
    }

    public function eventItems()
    {
        return $this->hasMany(EventItem::class);
    }

    public function scopeCurrent($query)
    {
        return $query->where('starting_at', '<', Carbon::now())->where('ending_at', '>', Carbon::now());
    }

    public function scopeUpcoming($query)
    {
        return $query->where('starting_at', '>', Carbon::now());
    }

    public function scopePast($query)
    {
        return $query->where('ending_at', '<', Carbon::now());
    }
}
