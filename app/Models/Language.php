<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Language extends Model
{
    use LogsActivity;

    protected $fillable = [
        'name',
        'code',
        'is_active',
    ];
    protected $casts = [
        'is_active' => 'boolean',
    ];
}
