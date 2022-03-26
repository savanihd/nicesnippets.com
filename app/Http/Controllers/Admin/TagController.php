<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use DB;
use App\Models\Tag;
use App\Models\PostTags;

class TagController extends AdminController
{
    function __construct()
    {
        parent::__construct();
        $this->tagModel = new tag;
        $this->postTagsModel = new postTags;
    }

    public function index(Request $request)
    {
        $getpost = DB::table('posts')
            ->where('status','PUBLISHED')
            ->pluck('title','id');

        return view('admin.tags.index',compact('getpost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        if($request->hasfile('image')){
            $imagename=$request->file('image');
            $imageName = $imagename->getClientOriginalName();
            $request->file('image')->move(public_path('/upload'),$imageName);
            
            DB::table('posts')
            ->where('id',$input['selectName'])
            ->update(['path'=>'/upload/'.$imageName]);
        }

        if($request->hasfile('uploadzip')){
            $zipFile = $request->file('uploadzip');
            $zipName = $zipFile->getClientOriginalName();
            $request->file('uploadzip')->move(public_path('/Download'),$zipName);

            DB::table('posts')
            ->where('id',$input['selectName'])
            ->update(['is_download'=> 1]);
        }

        if(isset($input['is_demo'])){
           $input['is_demo'] = $input['is_demo'];
        }else{
            $input['is_demo'] = 0;
        }

        DB::table('posts')
        ->where('id',$input['selectName'])
        ->update(['is_demo'=> $input['is_demo']]);

        if(!empty($input['hidden-tags'])){

            $tagsArray = explode(',',$input['hidden-tags']);

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
                $postid = $input['selectName'];
                $exit = DB::table('post_tags')->where('post_id',$postid)->where('tag_id',$tagid)->first();
                if(is_null($exit)){
                    $getpost_id = [];
                    $getpost_id['post_id']=$input['selectName'];
                    $getpost_id['tag_id']=$tagdata->id;
                    $this->postTagsModel->createData($getpost_id);
                }
            }
        }

        notificationMsg('success',$this->crudMessage('update','post'));

        return redirect()->route('tags.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getTagsList(Request $request)
    {
        $tagsArrayData = $this->tagModel->tagsLists();
        $tagsArrayData = array_values($tagsArrayData);
        return json_encode($tagsArrayData);
    }

    public function getAjaxPost($id)
    {
        $postData = DB::table('posts')
        ->where('id',$id)
        ->first();

        $getajaxData = $this->tagModel->getTagWithPostId($id);
        $values = '';
        foreach ($getajaxData as $value) {
            $values .= '<span>'.$value['tag'].'</span>';
        }
        $tagData = rtrim($values,',');
        
        return response()->json(array('tagData'=>$tagData,'postData'=>$postData));
    }
}
