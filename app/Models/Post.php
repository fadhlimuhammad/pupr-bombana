<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'divisi',
        'content',
        'image',
        'is_headline',
        'is_highlight',
        'published_at',
    ];
}
