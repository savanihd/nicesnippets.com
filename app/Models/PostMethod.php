<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Config;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class PostMethod extends Model
{
    use HasFactory, Cachable;

     protected $fillable = ['author_id','category_id','title','seo_title','excerpt','body','image','slug','meta_description','meta_keywords','status','featured','body_html','body_css','body_js','path','total_view','is_demo','is_download'];

    protected $table = 'posts';

    public function getPost($input)
    {
      $data = static::select("posts.*");
        
        if (!empty($input['filter']) && is_array($input['filter'])) {
            foreach ($input['filter'] as $column => $row) {
                if ((!empty($column) && !empty($row["value"]) && is_array($row)) || $row["value"] == '0') {
                    $operator = Config::get("setting.type", 1)[$row["type"]];
                    if ($row["type"] == 7) {
                        $data = $data->where("posts.".$column, $operator, "%{$row["value"]}%");
                    } else {
                        $data = $data->where("posts.".$column, $operator, $row["value"]);
                    }
                }
            }
        }

        return $data = $data->paginate(10);
    }

    public function addPost($input)
    {
      return static::create(array_only($input,$this->fillable));
    }

    public function findPost($id)
    {
      return DB::table('posts')->find($id);
    }

    public function updatePost($id, $input)
    {
        return static::where('id',$id)->update(array_only($input,$this->fillable));
    }

    public function destroyPost($id)
    {
        return DB::table('posts')->where('id',$id)->delete();
    }

    public function getTagUsingId($id)
    {
        return static::select('posts.*'
                    ,"tags.tag as tagName")
                    ->join("post_tags","post_tags.post_id","=","posts.id")
                    ->join("tags","tags.id","=","post_tags.tag_id")
                    ->where("posts.id",$id)
                    ->get();
    }

      public function indexPost()
    {
        return DB::table('posts')
                ->select('posts.*',
                DB::raw("(SELECT GROUP_CONCAT(tags.tag) FROM tags
                    LEFT JOIN post_tags ON post_tags.tag_id = tags.id
                    WHERE post_tags.post_id = posts.id
                    GROUP BY post_tags.post_id) as tagList"),
                DB::raw("(SELECT GROUP_CONCAT(tags.slug) FROM tags
                    LEFT JOIN post_tags ON post_tags.tag_id = tags.id
                    WHERE post_tags.post_id = posts.id
                    GROUP BY post_tags.post_id) as tagSlugList"))
            ->where('posts.status','PUBLISHED')
            ->groupBy("posts.id")
            ->orderBy("posts.id","DESC")
            ->paginate(9);
    }

    public function indexLatestPost()
    {
        return DB::table('posts')
            ->select('posts.*',
                    DB::raw("(SELECT GROUP_CONCAT(tags.tag) FROM tags
                        LEFT JOIN post_tags ON post_tags.tag_id = tags.id
                        WHERE post_tags.post_id = posts.id
                        GROUP BY post_tags.post_id) as tagList"),
                    DB::raw("(SELECT GROUP_CONCAT(tags.slug) FROM tags
                        LEFT JOIN post_tags ON post_tags.tag_id = tags.id
                        WHERE post_tags.post_id = posts.id
                        GROUP BY post_tags.post_id) as tagSlugList"))
            ->groupBy("posts.id")
            ->where('status','PUBLISHED')
            ->orderByRaw("RAND()")
            ->get()
            ->take(3);
    }

    public function postPost($slug)
    {
      return \Cache::remember('sn-'.$slug, 1000, function () use ($slug){
            return DB::table('posts')
              ->select('posts.*',
                  DB::raw("(SELECT GROUP_CONCAT(tags.tag) FROM tags
                      LEFT JOIN post_tags ON post_tags.tag_id = tags.id
                      WHERE post_tags.post_id = posts.id
                      GROUP BY post_tags.post_id) as tagList"),
                  DB::raw("(SELECT GROUP_CONCAT(tags.slug) FROM tags
                      LEFT JOIN post_tags ON post_tags.tag_id = tags.id
                      WHERE post_tags.post_id = posts.id
                      GROUP BY post_tags.post_id) as tagSlugList"))
              ->groupBy("posts.id")
              ->orderBy("posts.id","DESC")
              ->where('slug',$slug)
              ->where('status','PUBLISHED')
              ->first();
      });
    }   

    public function postLatestPost()
    {
      return \Cache::remember('latestpost', 1440, function (){
        return DB::table('posts')
            ->select('posts.*',
                    DB::raw("(SELECT GROUP_CONCAT(tags.tag) FROM tags
                        LEFT JOIN post_tags ON post_tags.tag_id = tags.id
                        WHERE post_tags.post_id = posts.id
                        GROUP BY post_tags.post_id) as tagList"),
                    DB::raw("(SELECT GROUP_CONCAT(tags.slug) FROM tags
                        LEFT JOIN post_tags ON post_tags.tag_id = tags.id
                        WHERE post_tags.post_id = posts.id
                        GROUP BY post_tags.post_id) as tagSlugList"))
            ->groupBy("posts.id")
            ->where('status','PUBLISHED')
            ->latest()
            ->get()
            ->take(5);
      });
    }

    public function postRelatedPost($postTagIdArray)
    {
        return DB::table('posts')
            ->select('posts.*',
                    DB::raw("(SELECT GROUP_CONCAT(tags.tag) FROM tags
                        LEFT JOIN post_tags ON post_tags.tag_id = tags.id
                        WHERE post_tags.post_id = posts.id
                        GROUP BY post_tags.post_id) as tagList"),
                    DB::raw("(SELECT GROUP_CONCAT(tags.slug) FROM tags
                        LEFT JOIN post_tags ON post_tags.tag_id = tags.id
                        WHERE post_tags.post_id = posts.id
                        GROUP BY post_tags.post_id) as tagSlugList"))
            ->leftjoin("post_tags","post_tags.post_id","=","posts.id")
            ->whereIn("post_tags.tag_id",$postTagIdArray)
            ->groupBy("posts.id")
            ->where('status','PUBLISHED')
            ->get()
            ->take(3);
    }

    public function postRandomPost()
    {
      return \Cache::remember('postRandomPost', 120, function (){
            return DB::table('posts')
              ->select('posts.*',
                      DB::raw("(SELECT GROUP_CONCAT(tags.tag) FROM tags
                          LEFT JOIN post_tags ON post_tags.tag_id = tags.id
                          WHERE post_tags.post_id = posts.id
                          GROUP BY post_tags.post_id) as tagList"),
                      DB::raw("(SELECT GROUP_CONCAT(tags.slug) FROM tags
                          LEFT JOIN post_tags ON post_tags.tag_id = tags.id
                          WHERE post_tags.post_id = posts.id
                          GROUP BY post_tags.post_id) as tagSlugList"))
              ->groupBy("posts.id")
              ->where('status','PUBLISHED')
              ->orderByRaw("RAND()")
              ->get()
              ->take(5);
      });
    }

    public function postPopularPost()
    {
        return DB::table('posts')
              ->groupBy("posts.id")
              ->orderByRaw("RAND()")
              ->get()
              ->take(10);
    }

    public function postSearchPosts()
    {
        return DB::table('posts')
            ->select('posts.*',
                DB::raw("(SELECT GROUP_CONCAT(tags.tag) FROM tags
                    LEFT JOIN post_tags ON post_tags.tag_id = tags.id
                    WHERE post_tags.post_id = posts.id
                    GROUP BY post_tags.post_id) as tagList"),
                DB::raw("(SELECT GROUP_CONCAT(tags.slug) FROM tags
                    LEFT JOIN post_tags ON post_tags.tag_id = tags.id
                    WHERE post_tags.post_id = posts.id
                    GROUP BY post_tags.post_id) as tagSlugList"))
            ->where('posts.title','LIKE','%'.$search.'%')
            ->where('posts.status','PUBLISHED')
            ->groupBy("posts.id")
            ->orderBy("posts.id","DESC")
            ->paginate(9);
    }

    public function postSearchLatestPost()
    {
        return DB::table('posts')
            ->select('posts.*',
                    DB::raw("(SELECT GROUP_CONCAT(tags.tag) FROM tags
                        LEFT JOIN post_tags ON post_tags.tag_id = tags.id
                        WHERE post_tags.post_id = posts.id
                        GROUP BY post_tags.post_id) as tagList"),
                    DB::raw("(SELECT GROUP_CONCAT(tags.slug) FROM tags
                        LEFT JOIN post_tags ON post_tags.tag_id = tags.id
                        WHERE post_tags.post_id = posts.id
                        GROUP BY post_tags.post_id) as tagSlugList"))
            ->groupBy("posts.id")
            ->where('status','PUBLISHED')
            ->orderByRaw("RAND()")
            ->get()
            ->take(3);
    }

    public function tagPagesTagName($slug)
    {
        return DB::table('tags')
                ->where('slug',$slug)
                ->first();
    }

    public function postDemoPost($slug)
    {
        return DB::table('posts')
            ->where('slug',$slug)
            ->first();
    }

    public function postTagList()
    {
        return DB::table('tags')->get();
    }

    public function postDemoZipPostZip($slug)
    {
        return DB::table('posts')
                ->where('slug',$slug)
                ->first();
    }
}
