<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use File;

class ImageUpload extends Model
{
    use HasFactory, Cachable;

    public static function removeFile($path)
    {
        if(File::exists(public_path($path))){
            File::delete(public_path($path));
        }
    }
    public static function removeDir($path)
    {
        if(File::isDirectory(public_path($path))){
            File::deleteDirectory(public_path($path));
        }
    }

    public static function upload($path, $image)
    {
        $imageName = time().'_'.$image->getClientOriginalName();
        $image->move(public_path($path),$imageName);
        
        return $imageName;
    }

    public static function uploadThumbnail($orgPath, $path, $image, $width, $height)
    {
        return Image::make(public_path($orgPath).$image)->resize($width, $height)->save(public_path($path).$image);
    }

    public static function uploadReduce($path, $image)
    {
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $ext = $image->getClientOriginalExtension();

        if($ext == 'png'){
            $read_from_path = $image->getPathName();
            $save_to_path = public_path($path.'/'.$imageName);

            $compressed_png_content = ImageUpload::compress_png($read_from_path);
            file_put_contents($save_to_path, $compressed_png_content);
            
        }else{
            $image->move(public_path($path),$imageName);
        }

        Image::make(public_path($path).$imageName)->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save();

        return $imageName;
    }
}
