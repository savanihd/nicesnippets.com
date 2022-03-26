<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Language;
use App\Models\Tutorial;


class TutorialController extends FrontController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->language = new Language;
        $this->tutorial = new Tutorial;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	view()->share('meta_title','Free Script Tutorials - NiceSnippets.com');
        view()->share('meta_description','Free Script Tutorials - NiceSnippets.com');
        view()->share('meta_keyword','Free Script Tutorials - NiceSnippets.com');

        $languageData = $this->language->fgetLanguage();

        return view('tutorial.index',compact('languageData'));

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function tutorialDetails($languageSlug, $tutorialSlug)
    {
        $tutorialData = $this->tutorial->fgetLangTutorialUsingSlug($languageSlug, $tutorialSlug);
        $tutorialList = $this->tutorial->fgetTutorialListUsingSlug($languageSlug);
        $languageData = $this->language->fgetLanguage();

        view()->share('meta_title',$tutorialData->meta_title);
        view()->share('meta_description',$tutorialData->meta_description);
        view()->share('meta_keyword',$tutorialData->meta_description);

        return view('tutorial.details',compact('tutorialData','tutorialList','languageData'));

    }

}    