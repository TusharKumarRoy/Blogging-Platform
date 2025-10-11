<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    //

       protected $fillable = [
        'title',
        'content',
        'excerpt',
        'is_featured',
        'category',
        'featured_image',
        'published_at',
    ];
    
}
