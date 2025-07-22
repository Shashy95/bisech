<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tour extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'paragraph',
    ];

    /**
     * Boot the model and handle slug generation.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($tour) {
            $tour->slug = self::generateUniqueSlug($tour->title);
        });

        static::updating(function ($tour) {
            $tour->slug = self::generateUniqueSlug($tour->title, $tour->id);
        });
    }

    /**
     * Generate a unique slug for the tour.
     */
    protected static function generateUniqueSlug($title, $ignoreId = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (self::where('slug', $slug)
            ->when($ignoreId, fn($query) => $query->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }

    /**
     * Get full image URL or fallback.
     */
    public function getImageUrlAttribute()
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : asset('images/default.jpg');
    }
}
