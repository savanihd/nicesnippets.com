<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogCategoryConnect;
use App\Models\ImageUpload;
use App\Models\RelatedBlogs;
use Validator;

class BlogController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->blog = new Blog;
        $this->blogCategory = new BlogCategory;
        $this->blogCategoryConnect = new BlogCategoryConnect;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->blog->getBlog($request->all());
        return view('admin.blog.index',compact('data'))
                    ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogCategoryList = $this->blogCategory->getBlogCategoryList();
        return view('admin.blog.create',compact('blogCategoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        // dd($input);
        $validator = Validator::make($input, [
            'title'=>'required',
            'blog_category_id'=>'required',
            'body'=>'required',
            'publish_date'=>'required_without:is_publish',
            'meta_description'=>'required',
        ],
        [
            'publish_date.required_without' => 'The publish date field is required when publish is no',
        ]);

        if ($validator->passes()) {

            if($request->hasFile('image')){
                $input['image'] = ImageUpload::upload('/upload/blog/',$request->file('image'));
            }

            $input['slug'] = \Str::limit( $input['title']);

            $input['is_publish'] = isset($input['is_publish']) ? '1' : '0';
            if (isset($input['publish_date']) && !empty($input['publish_date'])) {
                $input['publish_date'] = \Carbon\Carbon::createFromFormat('m/d/Y', $input['publish_date'])->format('Y-m-d');
            }else{
                unset($input['publish_date']);
            }
            $blog = $this->blog->addBlog($input);
            foreach ($input['blog_category_id'] as $key => $value) {
                $inputi['blog_id'] = $blog->id;
                $inputi['blog_category_id'] = $value;
                $this->blogCategoryConnect->addBlogCategoryConnect($inputi);
            }
            notificationMsg('success',$this->crudMessage('add','Blog'));

            return redirect(route('blogs.index'));
        }

        return redirect()->route('blogs.create')
                        ->withInput()
                        ->withErrors($validator);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = $this->blog->findBlog($id);
        if (!is_null($blog->publish_date)) {
            $blog->publish_date = \Carbon\Carbon::createFromFormat('Y-m-d', $blog->publish_date)->format('m/d/Y');
        }
        $blogCategoryConnect = $this->blogCategoryConnect->findBlogCategoryConnect($id);
        $blogCategoryList = $this->blogCategory->getBlogCategoryList();
        return view('admin.blog.edit',compact('blogCategoryList','blogCategoryConnect'))->with('blog', $blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title'=>'required',
            'body'=>'required',
            'publish_date'=>'required_without:is_publish',
            'meta_description'=>'required',
        ],
        [
            'publish_date.required_without' => 'The publish date field is required when publish is no',
        ]);

        if ($validator->passes()){
            if($request->hasFile('image')){
                $find = $this->blog->findBlog($id);

                if(!empty($find->image)){
                    ImageUpload::removeFile('/upload/blog/'.$find->image);
                }
                $input['image'] = ImageUpload::upload('/upload/blog/',$request->file('image'));
            }else{
                $input = array_except($input,['image']);  
            }

            $input['is_publish'] = isset($input['is_publish']) ? '1' : '0';
            
            if (isset($input['publish_date']) && !empty($input['publish_date']) && $input['is_publish'] == '0') {
                $input['publish_date'] = \Carbon\Carbon::createFromFormat('m/d/Y', $input['publish_date'])->format('Y-m-d');
            }else{
                $input['publish_date'] = NULL;
            }
            
            // $input['slug'] = \Str::limit( $input['title']);
            $this->blog->updateBlog($id ,$input);
            $this->blogCategoryConnect->destroyBlogCategoryConnect($id);

            foreach ($input['blog_category_id'] as $key => $value) {
                $inputi['blog_id'] = $id;
                $inputi['blog_category_id'] = $value;
                $this->blogCategoryConnect->addBlogCategoryConnect($inputi);
            }

            notificationMsg('success',$this->crudMessage('update','blog'));

            return redirect(route('blogs.index'));
        }

        return redirect()->back()->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->blog->destroyBlog($id);
        $this->blogCategoryConnect->destroyBlogCategoryConnect($id);

        notificationMsg('success',$this->crudMessage('delete','blog'));
        return redirect()->route('blogs.index');
    }

    public function relatedBlogs($id)
    {
        $blog = Blog::latest()->pluck('title','id')->toArray();
        $taglist = '';
        $tags = RelatedBlogs::where('blog_id',$id)->first();
        if (!empty($tags)) {
            $taglist = json_decode($tags->body);
        }
        return view('admin.blog.relatedblogs',compact('blog','id','taglist'));
    }

    public function relatedBlogStore(Request $request)
    {
        $find = RelatedBlogs::where('blog_id', $request->blog_id)->first();
        $inputi['body'] = json_encode($request->tags);
        $inputi['blog_id'] = $request->blog_id; 
        if (!is_null($find)) {
            $find->update(['body' => $inputi['body']]);
        }else{
            RelatedBlogs::create($inputi);
        }
        notificationMsg('success',$this->crudMessage('update','Tags'));
        return redirect(route('admin.related.blogs',['id' => $request->blog_id]));
    }
}
