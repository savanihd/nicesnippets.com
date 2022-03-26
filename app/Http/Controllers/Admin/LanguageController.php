<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Models\Language;
use Validator;
use App\Models\ImageUpload;

class LanguageController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();
        $this->language = new Language;
    }

    public function index(Request $request)
    {
        $data = $this->language->getLanguage($request->all());
        return view('admin.languages.index',compact('data'))
                    ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.languages.create');
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
            'image'=>'required',
            'name'=>'required',
            'description'=>'required',
            'meta_title'=>'required',
            'meta_description'=>'required',
        ]);

        if ($validator->passes()) {

            if($request->hasFile('image')){
                $input['image'] = ImageUpload::upload('/upload/language/',$request->file('image'));
            }
            $input['slug'] = \Str::limit( $input['name']);
            $this->language->addLanguage($input);

            notificationMsg('success',$this->crudMessage('add','Language'));

            return redirect(route('languages.index'));
        }

        return redirect()->route('languages.create')
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
        $language = $this->language->findLanguage($id);

        return view('admin.languages.edit')->with('language', $language);
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
            'description'=>'required',
            'meta_title'=>'required',
            'meta_description'=>'required',
        ]);

        if ($validator->passes()){
            if($request->hasFile('image')){
                $find = $this->language->findLanguage($id);

                if(!empty($find->image)){
                    ImageUpload::removeFile('/upload/language/'.$find->image);
                }
                $input['image'] = ImageUpload::upload('/upload/language/',$request->file('image'));
            }else{
                $input = array_except($input,['image']);  
            }
            
            $input['slug'] = \Str::limit( $input['name']);
            $this->language->updateLanguage($id ,$input);

            notificationMsg('success',$this->crudMessage('update','language'));

            return redirect(route('languages.index'));
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
        $this->language->destroyLanguage($id);

        notificationMsg('success',$this->crudMessage('delete','language'));
        return redirect()->route('languages.index');
    }
}
