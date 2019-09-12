<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Country extends Model
{
    use LogsActivity;

    protected $fillable = [
        'name',
        'code',
        'iso',
        'is_active',
    ];
    protected $casts = [
        'is_active' => 'boolean',
    ];
}
