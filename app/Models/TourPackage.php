<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TourPackage extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'paragraph',
    ];

    // Automatically generate slug on create
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->title);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->title);
        });
    }

    // Optional: Custom image URL accessor if using storage
    public function getImageUrlAttribute()
    {
        return $this->image 
            ? asset('storage/' . $this->image) 
            : asset('images/default-image.jpg');
    }
}
