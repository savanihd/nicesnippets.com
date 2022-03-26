<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Tag;
use App\PostTags;
use App\PostMethod;
use App\Language;
use App\Tutorial;
use App\Blog;

class HomeController extends FrontController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        parent::__construct();
        $this->tag = new Tag;
        $this->postTags = new PostTags;
        $this->postMethod = new PostMethod;
        $this->language = new Language;
        $this->tutorial = new Tutorial;
        $this->blog = new Blog;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = '';
        if (request()->has('page')) {
            $page = "Page ".request()->get('page')." - ";
        }
        view()->share('meta_title',$page.'NiceSnippets - Free code of snippet for HTML, Bootstrap');
        view()->share('meta_description',$page.'we provides good layouts design of snippets like profile, grid, pagination, chat, forms, buttons, model, slider, search, social, badges, controls, footer, select, calender, timeline etc. You can simple take html, css and js code and get layout of available snippets. We provide bootstrap design widget and we also provide without bootstrap snippets.');
        view()->share('meta_keyword',$page.'we provides good layouts design of snippets like profile, grid, pagination, chat, forms, buttons, model, slider, search, social, badges, controls, footer, select, calender, timeline etc. You can simple take html, css and js code and get layout of available snippets. We provide bootstrap design widget and we also provide without bootstrap snippets.');
        
        // DB::raw("(SELECT CONCAT(tags.tag) FROM tags
        //             JOIN post_tags ON post_tags.tag_id = tags.id
        //             WHERE  post_tags.post_id = posts.id
        //             GROUP BY tags.tag) as tagList")

        $posts = $this->postMethod->indexPost();
        $latestpost = $this->postMethod->indexLatestPost();

        return view('front.home',compact('posts','latestpost'));
    }
    public function newThemeIndex()
    {
        return view('newTheme.layout');
    }
    public function postDetail()
    {
        return view('newTheme.postDetail');
    }
    public function aboutus()
    {
        dd('about us');
    }

    public function post($slug)
    {
        $post = $this->postMethod->postPost($slug);

        if(is_null($post)){
            return redirect()->route('home');
        }

        DB::table('posts')->where('slug',$slug)->increment('total_view',1);

        $latestpost = $this->postMethod->postLatestPost($slug);

        // $postTagIdArray = $this->postTags->getPostTagIdArray($post->id);
        // $relatedpost = $this->postMethod->postRelatedPost($postTagIdArray);

        $randompost = $this->postMethod->postRandomPost();

        $randomblogs = $this->blog->orderBy(\DB::raw('RAND()'))->take(5)->get();
        $randomblogpost = $this->blog->orderBy(\DB::raw('RAND()'))->take(4)->get();

        // $popularpost = $this->postMethod->postPopularPost($slug);
            
        view()->share('meta_title',$post->title);
        view()->share('meta_description',$post->meta_description);
        view()->share('meta_keyword',$post->meta_keywords);
        view()->share('meta_image',url('/').$post->path);

        $tagPostList = $this->tag->getTagsFrontRandom();

        $postTags = $this->tag->getTagWithPostId($post->id);

        return view('front.post',compact('post','latestpost','postTags','tagPostList','randompost','randomblogs','randomblogpost'));
    }
    
    public function postSearch(Request $request)
    {
        $input = $request->all();
        $search = $input['q'];

        view()->share('meta_title','NiceSnippets - Free code of snippet for html');
        view()->share('meta_description','we provides good layouts design of snippets like profile, grid, pagination, chat, forms, buttons, model, slider, search, social, badges, controls, footer, select, calender, timeline etc. You can simple take html, css and js code and get layout of available snippets. We provide bootstrap design widget and we also provide without bootstrap snippets.');
        view()->share('meta_keyword','we provides good layouts design of snippets like profile, grid, pagination, chat, forms, buttons, model, slider, search, social, badges, controls, footer, select, calender, timeline etc. You can simple take html, css and js code and get layout of available snippets. We provide bootstrap design widget and we also provide without bootstrap snippets.');
        
        $posts = $this->postMethod->postSearchPosts();

        $latestpost = $this->postMethod->postSearchLatestPost();

        return view('front.search',compact('posts','latestpost','search'));
    }

    public function tagPages($slug)
    {   
        $page = '';
        if (request()->has('page')) {
            $page = "Page ".request()->get('page')." - ";
        }

        $tagname = $this->postMethod->tagPagesTagName($slug);

        if(is_null($tagname)){
            return redirect()->route('home');
        }

        view()->share('meta_title',$page.ucfirst($tagname->tag).' - NiceSnippets.com');
        view()->share('meta_description',$page.'we provides good layouts design of '.$tagname->tag.' snippets like profile, grid, pagination, chat, forms, buttons, model, slider, search, social, badges, controls, footer, select, calender, timeline etc. You can simple take html, css and js code and get layout of available snippets of '.$tagname->tag.'. We provide bootstrap design widget and we also provide without bootstrap snippets of '.$tagname->tag.'.');
        view()->share('meta_keyword',$page.'we provides good layouts design of '.$tagname->tag.' snippets like profile, grid, pagination, chat, forms, buttons, model, slider, search, social, badges, controls, footer, select, calender, timeline etc. You can simple take html, css and js code and get layout of available snippets of '.$tagname->tag.'. We provide bootstrap design widget and we also provide without bootstrap snippets of '.$tagname->tag.'.');

        if($slug == "bootstrap-4"){
            view()->share('meta_image','http://nicesnippets.com/image/tag-bootstrap-4.png');
        }

       $tagPages = $this->tag->getTag($slug);
                
       return view('front.tagdetail',compact('tagPages','tagname'));
    }

    public function taglist()
    {
        view()->share('meta_title','NiceSnippets - Free code of snippet for html');
        view()->share('meta_description','we provides good layouts design of snippets like profile, grid, pagination, chat, forms, buttons, model, slider, search, social, badges, controls, footer, select, calender, timeline etc. You can simple take html, css and js code and get layout of available snippets. We provide bootstrap design widget and we also provide without bootstrap snippets.');
        view()->share('meta_keyword','we provides good layouts design of snippets like profile, grid, pagination, chat, forms, buttons, model, slider, search, social, badges, controls, footer, select, calender, timeline etc. You can simple take html, css and js code and get layout of available snippets. We provide bootstrap design widget and we also provide without bootstrap snippets.'); 

        $taglist = $this->tag->getTagsFront();

        return view('front.tag',compact('taglist'));
    }

    public function postDemo($slug)
    {
        $slug = str_replace('-demo.html', '', $slug);

        $post = $this->postMethod->postDemoPost($slug);

        if(is_null($post)){
            return redirect()->route('home');
        }

        view()->share('meta_title','Live Demo - '.$post->title);
        view()->share('meta_description',"Live demo - ".$post->meta_description);
        view()->share('meta_keyword',$post->meta_keywords);
        view()->share('meta_image',url("/").$post->path);

        return view('front.demo',compact('post'));
    }

    public function postDemoZip($slug)
    {   
        $slug = str_replace('-Free-Download.html', '', $slug);

        $postZip = $this->postMethod->postDemoZipPostZip($slug);

        view()->share('meta_title','Free Download Code - '.$postZip->title);
        view()->share('meta_description',"Free Download Code - ".$postZip->meta_description);
        view()->share('meta_keyword',$postZip->meta_keywords);

        return view('front.downloadZip',compact('postZip'));
    }

    public function downloadZip($slug)
    {
        $file = public_path(). "/Download/".$slug.'.zip';
        return response()->download($file);
    }

    public function socialNetworkIndex()
    {
        $latestpost = $this->postMethod->postLatestPost();
        $popularpost = $this->postMethod->postPopularPost();
        $tagPostList = $this->tag->getTagsFrontRandom();

        view()->share('meta_title','Nicesnippets.com - Social Network');
        view()->share('meta_description','I like to see you are in this page. In social page i display all social sites pages of nicesnippets.com and we would like if you join with us on our pages. So you can keep touch with us on social network.');
        view()->share('meta_keyword','I like to see you are in this page. In social page i display all social sites pages of nicesnippets.com and we would like if you join with us on our pages. So you can keep touch with us on social network.');

        return view('front.socialNewtwork',compact('latestpost','tagPostList','popularpost'));
    }
}