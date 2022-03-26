<?php

namespace App\Models;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Language extends Model
{
    use HasFactory, Cachable;

    
    protected $fillable = ['name','slug','description','meta_title','meta_description','image'];

    public function getLanguage()
    {
        return static::latest()->paginate(10);
    }

    public function addLanguage($input)
    {
        return static::create($input);
    }

    public function findLanguage($id)
    {
        return static::find($id);
    }

    public function updateLanguage($id, $input)
    {
        return static::where('id',$id)->update(Arr::only($this->fillable));
    }

    public function destroyLanguage($id)
    {
        return static::where('id',$id)->delete();
    }

    public function getLanguageList()
    {
        return static::pluck('name','id')->all();
    }

    public function fgetLanguage()
    {
        return static::select("languages.*"
                    ,"tutorials.slug as tutorialSlug")
                    ->leftjoin("tutorials","tutorials.language_id","=","languages.id")
                    ->groupBy('languages.id')
                    ->get();
    }
}
