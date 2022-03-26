<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Models\FrontSettings;
use DB;

class AdminController extends Controller
{
    public function __construct()
	{
		$this->settingsData = DB::table('front_settings')->pluck('value','type')->all();

		view()->share('settingsFrontData',$this->settingsData);

		view()->share('adminTheme','adminTheme.default');	
	}

	public function crudMessage($type, $module)
	{
		switch ($type) {
			case 'add':
				return $module . ' created successfully';
				break;
			case 'delete':
				return $module . ' deleted successfully';
				break;
			case 'update':
				return $module . ' updated successfully';
				break;
			
			default:
				# code...
				break;
		}
	}
}
