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
        'category',
        'featured_image',
        'published_at',
    ];
    
}
