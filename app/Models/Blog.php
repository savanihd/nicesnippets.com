<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Config;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Blog extends Model
{
    use HasFactory, Cachable;

    protected $table = 'blogs';
    
    protected $fillable = [
        'title','slug','body','meta_description','image','total_view','is_publish','publish_date'
    ];

    // public function getBlog()
    // {
    //     return static::latest()->paginate(10);
    // }

    public function scopeIsPublish($query)
    {
        return $query->where('is_publish', '1');
    }

    public function getBlog($input)
    {
      $data = static::select("blogs.*");
        
        if (!empty($input['filter']) && is_array($input['filter'])) {
            foreach ($input['filter'] as $column => $row) {
                if ((!empty($column) && !empty($row["value"]) && is_array($row)) || $row["value"] == '0') {
                    $operator = Config::get("setting.type", 1)[$row["type"]];
                    if ($row["type"] == 7) {
                        $data = $data->where("blogs.".$column, $operator, "%{$row["value"]}%");
                    } else {
                        $data = $data->where("blogs.".$column, $operator, $row["value"]);
                    }
                }
            }
        }

        return $data = $data->orderBy('id' ,'DESC')->paginate(10);
    }
    
    public function addBlog($input)
    {
        return static::create(array_only($input,$this->fillable));
    }

    public function findBlog($id)
    {
        return static::find($id);
    }

    public function updateBlog($id, $input)
    {
        return static::where('id',$id)->update(array_only($input,$this->fillable));
    }

    public function destroyBlog($id)
    {
        return static::where('id',$id)->delete();
    }

    public function getBlogDetail($slug)
    {
        return static::where('slug',$slug)->where('is_publish', '1')->first();
    }

    public function getLatestBlogs()
    {
        return static::where('is_publish', '1')->latest()->paginate(10);
    }

    public function getLatestBlogsLimit()
    {
        return static::where('is_publish', '1')->latest()->take(5)->get();
    }
    
    public function blogCategoryConnect()
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_category_connect');
    }
}
