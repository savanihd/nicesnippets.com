<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FrontSettings;
use Validator;
use Illuminate\Http\Request;

class SettingController extends AdminController
{
	public function __construct()
	{
		parent::__construct();
		$this->frontSettings = new FrontSettings;
	}

    public function index()
    {
    	$input = [];
        $frontSettings = $this->frontSettings->getSettings();
        return view('admin.settings.index',compact('frontSettings'));
    }

    public function create(Request $request)
    { 
        $input = $request->all();

        $this->frontSettings->updateSettings($input);

        notificationMsg('success',$this->crudMessage('update','front settings'));

        return redirect()->back();
    }
}
