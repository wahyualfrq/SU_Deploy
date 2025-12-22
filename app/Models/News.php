<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image_path',
        'published_at',
        'author',
        'is_visible',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_visible' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function ($news) {
            if (empty($news->slug)) {
                $news->slug = Str::slug($news->title);
            }
        });
    }

    public function scopeVisible($query)
    {
        return $query
            ->where('is_visible', true)
            ->where('published_at', '<=', now());
    }
}


