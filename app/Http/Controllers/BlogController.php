<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogCategory;
use App\BlogCategoryConnect;
use App\FrontSettings;
use App\Tag;
use App\RelatedBlogs;
use DB;
use Artisan;

class BlogController extends Controller
{
	public function __construct()
	{
		$this->frontSettingsData = \Cache::remember('frontSettingsData', 1000, function (){
            return FrontSettings::pluck('value','type')->all();
        });
        

        view()->share('blogTheme','blogTheme.default');
        view()->share('settingsFrontData',$this->frontSettingsData);
        $this->tag = new Tag;
        $this->blog = new Blog;
        $this->blogCategory = new BlogCategory;
        $this->blogcategoryconnect = new BlogCategoryConnect;
        $latestCategory = $this->blogCategory->getLatestCategories();
        view()->share('latestCategory',$latestCategory);
	}

    public function blogIndex()
    {
        view()->share('meta_title','NiceSnippets | IT | Web | Code Blog Tutorials');
        view()->share('meta_description','NiceSnippets Blog provides you latest Code Tutorials on PHP, Laravel, Codeigniter, JQuery, Node js, React js, Vue js, PHP, and Javascript. Mobile technologies like Android, React Native, Ionic etc.');
        view()->share('meta_keyword','NiceSnippets Blog provides you latest Code Tutorials on PHP, Laravel, Codeigniter, JQuery, Node js, React js, Vue js, PHP, and Javascript. Mobile technologies like Android, React Native, Ionic etc.');

        $latestBlog = $this->blog->getLatestBlogs();
        $latestBlogLimit = $this->blog->getLatestBlogsLimit();
        $randomPostSidebar = $this->blog->where('is_publish', '1')->orderBy(\DB::raw('RAND()'))->take(10)->get();
    	return view('blog.index',compact('latestBlog','latestBlogLimit','randomPostSidebar'));
    }

    public function blogDetail($slug)
    {
        // \DB::table('blogs')->where('slug',$slug)->increment('total_view',1);

    	$blog = $this->blog->getBlogDetail($slug);

        view()->share('meta_title',$blog->title);
        view()->share('meta_description',$blog->meta_description);
        view()->share('meta_keyword',$blog->meta_description);

        if (!empty($blog->image)) {
            view()->share('meta_image',asset('/upload/blog/'.$blog->image));
        }
        $recommendedBlogs = '';
    	$latestBlogLimit = $this->blog->getLatestBlogsLimit();
        $randomPosts = $this->blog->where('is_publish','1')->orderBy(\DB::raw('RAND()'))->take(10)->get();
        $blogCat = $blog->blogCategoryConnect->pluck('id')->all();
        $randomPostSidebar = $this->blogcategoryconnect->getRandom($blogCat);
        $relatedBlogs = RelatedBlogs::where('blog_id',$blog->id)->first();
        if (!empty($relatedBlogs)) {
            $recommendedBlogs = json_decode($relatedBlogs->body);
        }
        $allBlogs = Blog::all();

    	return view('blog.blogDetail',compact('blog','latestBlogLimit', 'randomPosts','randomPostSidebar','recommendedBlogs','allBlogs'));
    }

    public function blogCat($slug)
    {

        $blogsCat = $this->blogCategory->findBlogsCatUsingSlug($slug);
        view()->share('meta_title',str_slug($blogsCat->name ?? 'test'));
        view()->share('meta_description',$blogsCat->meta_description ?? 'test');
        view()->share('meta_keyword',$blogsCat->meta_description ?? 'test');
        $blogsCatDetail = $blogsCat->blogCategoryConnect()->orderBy('id' ,'DESC')->paginate(10);
        $blogsCatName = $blogsCat->name;
        $latestBlogLimit = $this->blog->getLatestBlogsLimit();
        $randomPostSidebar = $this->blog->where('is_publish','1')->orderBy(\DB::raw('RAND()'))->take(5)->get();

        return view('blog.blogsCat',compact('latestBlogLimit','blogsCatName','randomPostSidebar','blogsCatDetail'));
    }

    public function categories()
    {
        view()->share('meta_title','Blog');
        view()->share('meta_description','Blog');
        view()->share('meta_keyword','Blog');

        $latestBlogLimit = $this->blog->getLatestBlogsLimit();
        $randomPosts = $this->blog->where('is_publish','1')->orderBy(\DB::raw('RAND()'))->take(5)->get();
        $randomPostSidebar = $this->blog->where('is_publish','1')->orderBy(\DB::raw('RAND()'))->take(5)->get();

        $categories = BlogCategory::withCount('categoryConnect')->latest('category_connect_count')->get();
        return view('blog.categories',compact('latestBlogLimit', 'randomPosts','randomPostSidebar','categories'));
    }

    public function postPublish()
    {
        Artisan::call('post:publish');
        return response()->json('Cron Run Successfully');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function disclaimer()
    {   

        view()->share('meta_title','disclaimer');
        view()->share('meta_description','disclaimer');
        view()->share('meta_keyword','disclaimer');


        $latestBlogLimit = $this->blog->getLatestBlogsLimit();
        $randomPosts = $this->blog->where('is_publish','1')->orderBy(\DB::raw('RAND()'))->take(5)->get();
        $randomPostSidebar = $this->blog->where('is_publish','1')->orderBy(\DB::raw('RAND()'))->take(5)->get();

        return view('blog.disclaimer',compact('latestBlogLimit','randomPosts','randomPostSidebar'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function privacyPolicy()
    {
        
        view()->share('meta_title','Privacy Policy');
        view()->share('meta_description','Privacy Policy');
        view()->share('meta_keyword','Privacy Policy');


        $latestBlogLimit = $this->blog->getLatestBlogsLimit();
        $randomPosts = $this->blog->where('is_publish','1')->orderBy(\DB::raw('RAND()'))->take(5)->get();
        $randomPostSidebar = $this->blog->where('is_publish','1')->orderBy(\DB::raw('RAND()'))->take(5)->get();

        return view('blog.privacyPolicy',compact('latestBlogLimit','randomPosts','randomPostSidebar'));
    }
}
