<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Support\Arr;

class PostTags extends Model
{
    use HasFactory, Cachable;

    protected $table = 'post_tags';

    protected $fillable = [
        'post_id','tag_id', 
    ];

    public function createData($input)
    {
        return static::create(Arr::only(,$this->fillable));
    }

    public function getPostTagIdArray($post_id)
    {
        return static::where("post_id",$post_id)->pluck('tag_id','tag_id')->all();
    }
}
