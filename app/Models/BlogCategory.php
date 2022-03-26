<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;
    
    protected $table = 'blog_categories';
    
    protected $fillable = [
        'name','slug','meta_description'
    ];

    public function getBlogCategory()
    {
        return static::withCount('categoryConnect')->latest()->paginate(10);
    }
    
    public function addBlogCategory($input)
    {
        return static::create(array_only($input,$this->fillable));
    }

    public function findBlogCategory($id)
    {
        return static::find($id);
    }

    public function updateBlogCategory($id, $input)
    {
        return static::where('id',$id)->update(array_only($input,$this->fillable));
    }

    public function destroyBlogCategory($id)
    {
        return static::where('id',$id)->delete();
    }

    public function getBlogCategoryList()
    {
        return static::latest()->pluck('name','id')->all();
    }

    public function findBlogsCatUsingSlug($slug)
    {
        return static::where('slug',$slug)->first();
    }
    
    public function categoryConnect()
    {
        return $this->belongsToMany(Blog::class, 'blog_category_connect')->where('is_publish', '1');
    }

    public function blogCategoryConnect()
    {
        return $this->belongsToMany(Blog::class, 'blog_category_connect')->where('is_publish', '1');
    }

    public function getLatestCategories()
    {
        return \Cache::remember('latest-category-limit',3600, function () {
            return static::latest()->get();
        });
    }
}
