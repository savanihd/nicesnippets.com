<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Support\Arr;

class Tags extends Model
{
    use HasFactory, Cachable;

    protected $fillable = ['tag','slug'];

    protected $table = 'tags';

    public function getTags()
    {
        return static::select("tags.*"
                ,DB::raw("COUNT(post_tags.post_id) as totalPost"))
                ->leftjoin("post_tags","post_tags.tag_id","=","tags.id")
                ->groupBy("tags.id")
                ->paginate(10);
    }

    public function addTag($input)
    {
        return static::create(Arr::only($input,$this->fillable));
    }

    public function findTag($id)
    {
        return static::find($id);
    }

    public function updateTag($id, $input)
    {
        return static::where('id',$id)->update(Arr::only($input,$this->fillable));
    }

    public function destroyTag($id)
    {
        return static::where('id',$id)->delete();
    }
}
