<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('token/save', 'TokenController@saveToken')->name('save.token');
Route::get('send/notification', 'TokenController@sendNotification')->name('send.notification');

Route::get('stripe/payment/response', 'FrontController@stripeWebhook')->name('stripe.response');

Route::get('new-server', function(){
    echo \App\Models\Blog::first();
});

Route::get('/',['as'=>'home','uses'=>'BlogController@blogIndex']);
Route::get('/snippet', ['as'=>'snippet','uses'=>'HomeController@index']);
Route::get('/tag/{slug}',['as'=>'tag.pages','uses'=>'HomeController@tagPages']);
Route::get('/snippet/{slug}', ['as'=>'post.detail','uses'=>'HomeController@post']);
Route::get('/live/{slug}',['as'=>'post.demo','uses'=>'HomeController@postDemo']);
Route::get('/download/{slug}',['as'=>'postZip.demo','uses'=>'HomeController@postDemoZip']);
Route::get('/downloadZip/{slug}',['as'=>'postZip.download','uses'=>'HomeController@downloadZip']);
Route::get('/aboutus', ['as'=>'post.aboutus','uses'=>'HomeController@aboutus']);
Route::post('/getAjaxPost/{id}',['as'=>'getajax.post_data','uses'=>'TagController@getAjaxPost']);
Route::get('/tagslist',['as'=>'taglist','uses'=>'HomeController@taglist']);
Route::get('/social-network',['as'=>'social.network','uses'=>'HomeController@socialNetworkIndex']);
Route::get('/blog/cat/{slug}', ['as'=>'blog.cat','uses'=>'BlogController@blogCat']);
Route::get('/post-publish', ['as'=>'post.publish','uses'=>'BlogController@postPublish']);

//Tutorial
Route::get('free-tutorials',['as'=>'tutorial','uses'=>'TutorialController@index']);

// new theme route
Route::get('new-theme','HomeController@newThemeIndex');
Route::get('new-theme-detail',['as'=>'new-theme.detail','uses'=>'HomeController@postDetail']);
Route::get('search',['as'=>'post.search','uses'=>'HomeController@postSearch']);
//blogs rss
Route::get('blog/rss', function(){
    $blogs = DB::table('blogs')->orderBy('created_at', 'desc')->get();
    $content = view("front.rssFeedBlog",compact('blogs'));
    return Response::make($content, '200')->header('Content-Type', 'text/xml');
});
// Blog route
Route::get('/blog',['as'=>'blog.index','uses'=>'BlogController@blogIndex']);
Route::get('/blog/{slug}', ['as'=>'blog.detail','uses'=>'BlogController@blogDetail']);
Route::get('/categories',['as'=>'categories.index','uses'=>'BlogController@categories']);

Route::get('/disclaimer',['as'=>'disclaimer.index','uses'=>'BlogController@disclaimer']);
Route::get('/privacy-policy',['as'=>'privacy.policy.index','uses'=>'BlogController@privacyPolicy']);

Route::get('login', array('as'=> 'login', 'uses' => 'Auth\LoginController@showLoginForm'));
Route::post('login', array('as'=> 'login.post', 'uses' => 'Auth\LoginController@login'));
Route::post('logout', array('as'=> 'logout', 'uses' => 'Auth\LoginController@logout'));

Route::group(['prefix' => 'tools'], function () {
    Route::get('online-editor',['as'=>'tools-online-editor','uses'=>'ToolsController@toolsOnlineEditor']);
    Route::get('online-counter',['as'=>'tools-online-counter','uses'=>'ToolsController@toolsOnlineCounter']);
    Route::get('online-convert-case',['as'=>'tools-online-convert-case','uses'=>'ToolsController@toolsOnlineConvertCase']);
    Route::get('online-encode-decode-string',['as'=>'tools-online-encode-decode-string','uses'=>'ToolsController@toolsOnlineEncodeDecodeString']);
    Route::get('online-generate-password',['as'=>'tools-online-generate-password','uses'=>'ToolsController@toolsOnlineGeneratePassword']);
});

Route::group(['middleware' => ['auth','IsAdmin']], function () {
    Route::get('admin/home', array('as'=> 'admin.home', 'uses' => 'AdminHomeController@index'));

    // PostController
    Route::resource('posts','Admin\PostController');
    Route::get('post/tag/{id}', array('as'=> 'post.tag.create', 'uses' => 'Admin\PostController@createTag'));
    Route::post('post/tag/store', array('as'=> 'post.tag.store', 'uses' => 'Admin\PostController@addTag'));
    Route::get('post/clear/cache/{slug}', array('as'=> 'post.clear.cache', 'uses' => 'Admin\PostController@postClearCache'));
    
    Route::get('images', array('as'=> 'images.index', 'uses' => 'AdminHomeController@imageUpload'));
    Route::post('imagesStore', array('as'=> 'images.store', 'uses' => 'AdminHomeController@imagestore'));

    // UserController
    Route::resource('users','Admin\UserController');

    // SettingController
    Route::resource('settings','Admin\SettingController');

    // TagController
    Route::resource('tags','Admin\TagController');

    // TagsController
    Route::resource('tags-crud','Admin\TagsController');

    // LanguageController
    Route::resource('languages','Admin\LanguageController');

    // TutorialsController
    Route::resource('tutorials','Admin\TutorialsController');

    // BlogCategoryController
    Route::resource('category-blog','Admin\BlogCategoryController');

    // BlogController
    Route::resource('blogs','Admin\BlogController');

    Route::get('settings', array('as'=> 'front.settings', 'uses' => 'Admin\SettingController@index'));
    Route::post('settingsUpdate', array('as'=> 'front.settings.update', 'uses' => 'Admin\SettingController@create'));

    Route::get('admin/get-tags-list/ajax',['as'=> 'admin.tags.list.ajax', 'uses' => 'Admin\TagController@getTagsList']);
    Route::post('admin/getAjaxPost/{id}',['as'=>'admin.getajax.post_data','uses'=>'Admin\TagController@getAjaxPost']);


    Route::get('admin/tag/',['as'=> 'admin.tags', 'uses' => 'TagController@getpost']);
    Route::post('admin/store',['as'=> 'admin.tags.store', 'uses' => 'TagController@store']);
    Route::get('admin/get-tags-list',['as'=> 'admin.tags.list', 'uses' => 'TagController@getTagsList']);

    Route::get('blogs/related-blogs/{id}', array('as'=> 'admin.related.blogs', 'uses' => 'Admin\BlogController@relatedBlogs'));
    Route::post('blogs/related-blogs/store',['as'=> 'admin.related.blog.store', 'uses' => 'Admin\BlogController@relatedBlogStore']);
});

Route::get('sitemap', function(){
    ini_set('memory_limit', '1024M');
    set_time_limit(0); //60 seconds = 1 minute

    // create new sitemap object
    $sitemap = App::make("sitemap");

    $sitemap->add(URL::to('/'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('/tools/online-editor'), '2018-05-02T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('/tools/online-counter'), '2018-05-02T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('/tools/online-convert-case'), '2018-05-02T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('/tools/online-encode-decode-string'), '2018-05-03T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('/social-network'), '2018-05-02T20:10:00+02:00', '1.0', 'daily');

    // add every post to the sitemap
    $posts = DB::table('posts')->orderBy('created_at', 'desc')->get();
    foreach ($posts as $key=>$post)
    {   
        $images = [];
        $images[] = [
            'url' => URL::to('/').$post->path,
            'title' => $post->title,
            'caption' => $post->title
        ];
     
        $sitemap->add(URL::route('post.detail',[$post->slug]), $post->created_at, '1.0', 'daily', $images);
    }

    // add every tags to the sitemap
    $tags = DB::table('tags')->orderBy('created_at', 'desc')->get();
    foreach ($tags as $key=>$tag)
    {   
        $sitemap->add(URL::route('tag.pages',[$tag->slug]), $tag->created_at, '1.0', 'daily');
    }

    return $sitemap->render('xml');
});


Route::get('rss', function(){
    $posts = DB::table('posts')->orderBy('posts.id', 'desc')->get();
    $content = view("front.rssFeed",compact('posts'));
    return Response::make($content, '200')->header('Content-Type', 'text/xml');
});



Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('sitemap-tutorials', function(){

        $sitemap = App::make("sitemap");

         $sitemap->add(URL::to('/free-tutorials'), '2018-05-05T20:10:00+02:00', '1.0', 'daily');

         $posts = DB::table('languages')
                        ->select("tutorials.*","languages.slug as languages_slug")
                        ->join("tutorials","tutorials.language_id","=","languages.id")
                        ->orderBy('tutorials.created_at', 'desc')
                        ->get();

         foreach ($posts as $post)
         {
            $sitemap->add(URL::to('/'.$post->languages_slug.'/'.$post->slug), $post->created_at, '1.0', 'daily');
         }

    return $sitemap->render('xml');

});

Route::get('sitemap-blogs', function(){

        $sitemap = App::make("sitemap");

         $posts = DB::table('blogs')->where('is_publish','1')->orderBy('created_at', 'desc')->get();

         foreach ($posts as $post)
         {
            $sitemap->add(route('blog.detail',$post->slug), $post->created_at, '1.0', 'daily');
         }

         $sitemap->add(URL::to('/blog'), '2019-09-09T20:10:00+02:00', '1.0', 'daily');

         return $sitemap->render('xml');

});

Route::get('/{languageSlug}/{tutorialSlug}',['as'=>'tutorialDetails','uses'=>'TutorialController@tutorialDetails']);

