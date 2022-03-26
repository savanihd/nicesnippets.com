<?php
	
function getPostImagePath($path)
{		
	if(\File::exists(public_path($path))){

	$pathimg = trim($path,'/upload/');
		if(\File::exists(public_path('/upload/thumbnail/'.$pathimg))){
			return '/upload/thumbnail/'.$pathimg;

		}else{
			Image::make(public_path($path))->resize(400,205)->save(public_path('/upload/thumbnail/'.$pathimg));
			return '/upload/thumbnail/'.$pathimg; 
		}
	}else{
		return "/image/img_default.png";
	}

}		

function notificationMsg($type, $message){
	\Session::put($type, $message);
}

function str_replace_description($from, $to, $content)
{
	$from = '/'.preg_quote($from, '/').'/';

	return preg_replace($from, $to, $content, 1);
}