<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Tutorial;
use App\Language;
use Validator;

class TutorialsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();
        $this->tutorial = new Tutorial;
        $this->language = new Language;
    }

    public function index(Request $request)
    {
        $data = $this->tutorial->getTutorial($request->all());
        return view('admin.tutorials.index',compact('data'))
                    ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languageList = $this->language->getLanguageList();
        return view('admin.tutorials.create',compact('languageList'));
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
            'language_id'=>'required',
            'topic_name'=>'required',
            'description'=>'required',
            'sort'=>'required',
            'meta_title'=>'required',
            'meta_description'=>'required',
        ],
        [
            'language_id.required' => 'The language field is required.'
        ]);

        if ($validator->passes()) {

            $input['slug'] = str_slug($input['topic_name']);
            $this->tutorial->addTutorial($input);

            notificationMsg('success',$this->crudMessage('add','tutorial'));

            return redirect(route('tutorials.index'));
        }

        return redirect()->route('tutorials.create')
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
        $languageList = $this->language->getLanguageList();
        $tutorial = $this->tutorial->findTutorial($id);

        return view('admin.tutorials.edit',compact('languageList'))->with('tutorial', $tutorial);
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
            'language_id'=>'required',
            'topic_name'=>'required',
            'description'=>'required',
            'sort'=>'required',
            'meta_title'=>'required',
            'meta_description'=>'required',
        ],
        [
            'language_id.required' => 'The language field is required.'
        ]);

        if ($validator->passes()){

            $input['slug'] = str_slug($input['topic_name']);
            $this->tutorial->updateTutorial($id ,$input);

            notificationMsg('success',$this->crudMessage('update','tutorial'));

            return redirect(route('tutorials.index'));
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
        $this->tutorial->destroyTutorial($id);

        notificationMsg('success',$this->crudMessage('delete','tutorial'));
        return redirect()->route('tutorials.index');
    }
}
