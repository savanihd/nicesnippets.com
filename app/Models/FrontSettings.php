<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class FrontSettings extends Model
{
    use HasFactory, Cachable;

    protected $table = 'front_settings';

    protected $fillable = [
        'type', 'value'
    ];

    public function getSettings()
    {
        $data = FrontSettings::get()->toArray();
        $result = [];
        foreach ($data as $key => $value) {
            $result[$value['type']] = $value;
        }
        return $result;
    }

    public function updateSettings($input)
    {
        foreach ($input as $key=>$value){
           FrontSettings::where('type',$key)->update(array('value'=>$value));  
        }
        return;
    }   
}
