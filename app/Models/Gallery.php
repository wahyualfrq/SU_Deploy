<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'cover_image',
        'cover_image_public_id',
        'is_visible',
    ];

    protected static function booted()
    {
        static::creating(function ($gallery) {
            $gallery->slug = static::uniqueSlug($gallery->title);
        });

        static::updating(function ($gallery) {
            if ($gallery->isDirty('title')) {
                $gallery->slug = static::uniqueSlug(
                    $gallery->title,
                    $gallery->id
                );
            }
        });
    }

    public static function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $i = 1;

        while (
            static::query()
                ->where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $base.'-'.$i++;
        }

        return $slug;
    }

    public function getCoverImageUrlAttribute(): string
    {
        return $this->cover_image
            ?: 'https://via.placeholder.com/800x500';
    }
}
