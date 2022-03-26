<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    
    protected $fillable = ['name','slug','description','meta_title','meta_description','image'];

    public function getLanguage()
    {
        return static::latest()->paginate(10);
    }

    public function addLanguage($input)
    {
        return static::create(array_only($input,$this->fillable));
    }

    public function findLanguage($id)
    {
        return static::find($id);
    }

    public function updateLanguage($id, $input)
    {
        return static::where('id',$id)->update(array_only($input,$this->fillable));
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
