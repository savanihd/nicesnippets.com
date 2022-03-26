<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\FrontSettings;

class FrontController extends Controller
{
    public function __construct()
    {
        $this->frontSettingsData = \Cache::remember('frontSettingsData', 1000, function (){
            return FrontSettings::pluck('value','type')->all();
        });

        view()->share('settingsFrontData',$this->frontSettingsData);

        view()->share('frontTheme','newTheme.default');
        $footerLatestPost = \Cache::remember('footerLatestPost', 1000, function (){
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

        view()->share('footerLatestPost',$footerLatestPost);      
    }
    
    public function stripeWebhook(Request $request){
        \Log::info($request->all());
    }
}