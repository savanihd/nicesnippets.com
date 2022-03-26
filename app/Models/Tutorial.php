<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    use HasFactory;

    protected $fillable = ['language_id','topic_name','slug','description','example_demo','html_code','css_code','js_code','sort','meta_title','meta_description'];

    public function getTutorial()
    {
        return static::select('tutorials.*'
                    ,"languages.name as languageName"
                    ,"languages.slug as languageSlug")
                    ->leftjoin("languages","languages.id","=","tutorials.language_id")
                    ->latest()
                    ->paginate(10);
    }

    public function addTutorial($input)
    {
        return static::create(array_only($input,$this->fillable));
    }

    public function findTutorial($id)
    {
        return static::find($id);
    }

    public function updateTutorial($id, $input)
    {
        return static::where('id',$id)->update(array_only($input,$this->fillable));
    }

    public function destroyTutorial($id)
    {
        return static::where('id',$id)->delete();
    }

    public function fgetTutorialUsingSlug($slug)
    {
        return static::where('slug',$slug)->first();
    }

    public function fgetLangTutorialUsingSlug($languageSlug, $tutorialSlug)
    {
        return static::select("tutorials.*"
                    ,"languages.name as languageName")
                    ->leftjoin("languages","languages.id","=","tutorials.language_id")
                    ->where('tutorials.slug',$tutorialSlug)
                    ->where('languages.slug',$languageSlug)
                    ->first();
    }

    public function fgetTutorialListUsingSlug($languageSlug)
    {
        return static::select("tutorials.*"
                    ,"languages.slug as languageSlug")
                    ->leftjoin("languages","languages.id","=","tutorials.language_id")
                    ->where('languages.slug',$languageSlug)
                    ->get();
    }
}
