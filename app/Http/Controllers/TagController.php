<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\PostTags;
use DB;

class TagController extends FrontController
{
    function __construct()
    {
        parent::__construct();
        $this->tagModel = new tag;
        $this->postTagsModel = new postTags;

    }

    public function getpost()
    {
        $getpost = DB::table('posts')
            ->where('status','PUBLISHED')
            ->pluck('title','id');

        return view('admin.tags.create',compact('getpost'));
    }

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
                $ainput['slug'] = str_slug($value);
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

        return redirect()->route('admin.tags');
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
