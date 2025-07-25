<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
    'title', 'location', 'category', 'price', 'discount',
    'description', 'image', 'slug'
];
}
