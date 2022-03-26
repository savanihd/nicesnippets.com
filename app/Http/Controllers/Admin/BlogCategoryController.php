<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\BlogCategory;
use Validator;

class BlogCategoryController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();
        $this->blogCategory = new BlogCategory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->blogCategory->getBlogCategory();
        return view('admin.blogCategory.index',compact('data'))
                    ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogCategory.create');
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
            'name'=>'required',
            'meta_description'=>'required'
        ]);

        if ($validator->passes()) {
            $input['slug'] = str_slug( $input['name']);

            $this->blogCategory->addBlogCategory($input);

            notificationMsg('success',$this->crudMessage('add','Blog Category'));

            return redirect(route('category-blog.index'));
        }

        return redirect()->route('category-blog.create')
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
        $blogCategory = $this->blogCategory->findBlogCategory($id);

        return view('admin.blogCategory.edit')->with('blogCategory', $blogCategory);
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
            'name'=>'required',
            'meta_description'=>'required',
        ]);

        if ($validator->passes()){
            $input['slug'] = str_slug( $input['name']);
            $this->blogCategory->updateBlogCategory($id ,$input);

            notificationMsg('success',$this->crudMessage('update','Blog Category'));

            return redirect(route('category-blog.index'));
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
        $this->blogCategory->destroyBlogCategory($id);

        notificationMsg('success',$this->crudMessage('delete','Blog Category'));
        return redirect()->route('category-blog.index');
    }
}
