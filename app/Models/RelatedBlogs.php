<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class RelatedBlogs extends Model
{
    use HasFactory, Cachable;

    protected $table = 'related_blogs';

    protected $fillable = [
        'blog_id','body', 
    ];

}
