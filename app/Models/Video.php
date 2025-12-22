<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'title',
        'youtube_url',
        'youtube_id',
        'thumbnail',
        'duration',
        'published_at',
        'is_visible',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_visible' => 'boolean',
    ];
}
