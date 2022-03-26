<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use Validator;
use App\Models\PostMethod;
use DB;
use App\Models\PostTags;

class PostController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->postMethod = new PostMethod;
        $this->postTagsModel = new postTags;
    }

    public function index(Request $request)
    {
        $data = $this->postMethod->getPost($request->all());
        return view('admin.posts.index',compact('data'))
                    ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
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

        $validator = Validator::make($input, [
            'title'=>'required',
            'seo_title'=>'required',
            'body'=>'required',
            'slug'=>'required',
            'meta_description'=>'required',
            'meta_keywords'=>'required',
        ]);

        if ($validator->passes()) {
            $input['author_id'] = auth()->user()->id;
            $input['status'] = 'PUBLISHED';
            $this->postMethod->addPost($input);

            notificationMsg('success',$this->crudMessage('add','post'));

            return redirect(route('posts.index'));
        }

        return redirect()->route('posts.create')
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
        $post = $this->postMethod->findPost($id);

        return view('admin.posts.edit')->with('post', $post);
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
            'seo_title'=>'required',
            'body'=>'required',
            'slug'=>'required',
            'meta_description'=>'required',
            'meta_keywords'=>'required',
        ]);

        if ($validator->passes()) {
            if($request->hasfile('image')){
                $imagename=$request->file('image');
                $imageName = $imagename->getClientOriginalName();
                $request->file('image')->move(public_path('/upload'),$imageName);
                
                DB::table('posts')->where('id',$id)->update(['path'=>'/upload/'.$imageName]);
            }

            if($request->hasfile('uploadzip')){
                $zipFile = $request->file('uploadzip');
                $zipName = $zipFile->getClientOriginalName();
                $request->file('uploadzip')->move(public_path('/Download'),$zipName);

                DB::table('posts')->where('id',$id)->update(['is_download'=> 1]);
            }

            if(isset($input['is_demo'])){
               $input['is_demo'] = $input['is_demo'];
            }else{
                $input['is_demo'] = 0;
            }

            DB::table('posts')->where('id',$id)->update(['is_demo'=> $input['is_demo']]);

            $this->postMethod->updatePost($id ,$input);

            notificationMsg('success',$this->crudMessage('update','post'));

            return redirect(route('posts.index'));
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
        $this->postMethod->destroyPost($id);

        notificationMsg('success',$this->crudMessage('delete','post'));
        return redirect()->route('posts.index');
    }

    public function createTag($id)
    {   
        $post = $this->postMethod->findPost($id);

        $tagList = $this->postMethod->getTagUsingId($id);

        return view('admin.posts.tagEdit',compact('post','tagList','id'));
    }

    public function addTag(Request $request)
    {
        $input = $request->all();

        if(!empty($input['hidden-tag'])){
            $tagsArray = explode(',',$input['hidden-tag']);

            foreach($tagsArray as $key=>$value) 
            {
                $ainput = [];
                $ainput['tag'] = $value;
                $ainput['slug'] = \Str::limit($value);
                $tagdata = DB::table('tags')->where('slug', $ainput['slug'])->first();
                if(is_null($tagdata)){
                    $tagdata = $this->tagModel->createData($ainput);
                }
                $tagid = $tagdata->id;
                $postid = $input['postId'];
                $exit = DB::table('post_tags')->where('post_id',$postid)->where('tag_id',$tagid)->first();
                if(is_null($exit)){
                    $getpost_id = [];
                    $getpost_id['post_id']=$input['postId'];
                    $getpost_id['tag_id']=$tagdata->id;
                    $this->postTagsModel->createData($getpost_id);
                }
            }
        }

        notificationMsg('success',$this->crudMessage('add','tag'));

        return redirect(route('posts.index'));

    }

    public function postClearCache($slug)
    {
        $postData = PostMethod::where("slug",$slug)->first();

        \Cache::forget('sn-'.$slug);

        \Cache::forget('getTagWithPostId-'.$postData->id);

        notificationMsg('success','cache clear successfully');

        return redirect()->back();
    }
}
