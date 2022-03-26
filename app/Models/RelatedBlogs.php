<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedBlogs extends Model
{
    use HasFactory;

    protected $table = 'related_blogs';

    protected $fillable = [
        'blog_id','body', 
    ];

}
