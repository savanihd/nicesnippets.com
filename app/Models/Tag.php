<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Tag extends Model
{
    use HasFactory, Cachable;

    protected $table = 'tags';

    protected $fillable = [
        'tag','slug','is_download','is_demo',
    ];

    public function createData($input)
    {
        return static::create(array_only($input,$this->fillable));
    }

    public function tagsLists()
    {
        return static::pluck('tag','id')->all();
    }

    public function getTag($slug)
    {
        return  static::select("post_tags.*" ,"posts.*")
                ->join("post_tags","post_tags.tag_id","=","tags.id")
                ->join("posts","posts.id","=","post_tags.post_id")
                ->where('tags.slug',$slug)
                ->orderBy("posts.created_at", "desc")
                ->paginate(6);
    }

    public function getTagWithPostId($postId)
    {
        return \Cache::remember('getTagWithPostId-'.$postId, 1400, function () use($postId){
            return static::select("tags.*"
                ,DB::raw("(SELECT COUNT(post_tags.tag_id) FROM post_tags
                    WHERE post_tags.tag_id = tags.id
                    GROUP BY tags.id) as totalPost")
                )
                ->leftjoin("post_tags","post_tags.tag_id","=","tags.id")
                ->where('post_tags.post_id',$postId)
                ->groupBy("tags.id")
                ->get();
        });
    }

    public function getTagsFront()
    {
        return static::select("tags.*"
                ,DB::raw("COUNT(post_tags.post_id) as totalPost")
                )   
                ->leftjoin("post_tags","post_tags.tag_id","=","tags.id")
                ->groupBy("tags.id")
                ->get();
    }

    public function getTagsFrontRandom()
    {
        return \Cache::remember('getTagsFrontRandom', 30, function (){
            return static::select("tags.*"
                ,DB::raw("COUNT(post_tags.post_id) as totalPost")
                )
                ->leftjoin("post_tags","post_tags.tag_id","=","tags.id")
                ->groupBy("tags.id")
                ->orderByRaw("RAND()")
                ->take(15)
                ->get();
        });
    }
}
