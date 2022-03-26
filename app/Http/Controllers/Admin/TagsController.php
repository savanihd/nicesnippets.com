<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tags;
use Validator;

class TagsController extends AdminController
{
    function __construct()
    {
        parent::__construct();
        $this->tags = new Tags;
    }

    public function index(Request $request)
    {
        $data = $this->tags->getTags($request->all());
        return view('admin.tagsCrud.index',compact('data'))
                    ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tagsCrud.create');
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
            'tag'=>'required',
            'slug'=>'required',
        ]);

        if ($validator->passes()) {
            $this->tags->addTag($input);

            notificationMsg('success',$this->crudMessage('add','tag'));

            return redirect(route('tags-crud.index'));
        }

        return redirect()->route('tags-crud.create')
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
        $tag = $this->tags->findTag($id);

        return view('admin.tagsCrud.edit')->with('tag', $tag);
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
            'tag'=>'required',
            'slug'=>'required',
        ]);

        if ($validator->passes()) {
            $this->tags->updateTag($id ,$input);

            notificationMsg('success',$this->crudMessage('update','tag'));

            return redirect(route('tags-crud.index'));
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
        $this->tags->destroyTag($id);

        notificationMsg('success',$this->crudMessage('delete','tag'));
        return redirect()->route('tags-crud.index');
    }
}
