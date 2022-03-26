<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class BlogCategoryConnect extends Model
{
    use HasFactory, Cachable;

    protected $table = 'blog_category_connect';
    
    protected $fillable = [
        'blog_category_id','blog_id'
    ];

    public function addBlogCategoryConnect($inputi)
    {
        return static::create($inputi);
    }

    public function findBlogCategoryConnect($id)
    {
        return static::where('blog_id',$id)->pluck('blog_category_id','blog_category_id')->all();
    }

    public function updateBlogCategoryConnect($id, $input)
    {
        return static::where('id',$id)->update($input);
    }

    public function destroyBlogCategoryConnect($id)
    {
        return static::where('blog_id',$id)->delete();
    }

    public function getBlogsCat($slug)
    {
        return static::where('slug',$slug)->paginate(10);

    }
    
    public function getBlogsCatDetail($blogsCatId)
    {
        return static::where('blog_category_id',$blogsCatId)->get();
    }

    public function blogCategoryConnect()
    {
        return $this->hasMany(BlogCategory::class, 'id','blog_id');
    }

    public function getBlogsCatDetailAll()
    {
        return $this->belongsTo(Blog::class, 'id');;
    }

     public function getRandom($id)
    {
        return $this->whereIn('blog_category_id',[$id])
                ->join('blogs', 'blogs.id', '=', 'blog_category_connect.blog_id')
                ->select('blogs.*')
                ->orderBy(\DB::raw('RAND()'))
                ->take(10)
                ->get();
    }
}
