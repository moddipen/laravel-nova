<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'snippet',
        'body',
        'is_sticky',
        'is_visible',
        'is_video',
        'published_at',
        'unpublished_at',
        'permalink',
        'image_src',
    ];

    protected $casts = [
        'published_at' => 'date',
        'unpublished_at' => 'date',
    ];
}
