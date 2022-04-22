<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FrontSettings;
use Validator;

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

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dbBackup()
    {
        $filename = "backup-" . \Carbon\Carbon::now()->format('Y-m-d') . ".gz";
        $path = storage_path() . "/app/public/db/" . $filename;
  
        $command = "mysqldump --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  | gzip > " . $path;
  
        $returnVar = NULL;
        $output  = NULL;
  
        exec($command, $output, $returnVar);

        return response()->download($path)->deleteFileAfterSend(true);
    }
}
