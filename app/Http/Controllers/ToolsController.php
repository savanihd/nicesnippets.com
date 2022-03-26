<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolsController extends FrontController
{
    public function toolsOnlineEditor()
    {
    	view()->share('meta_title','Online Real Time HTML CSS JS Editor with Preview - Nicesnippets.com');
        view()->share('meta_description','online html css editor free, real time html editor online, html js css editor online, online html css javascript php editor, html code online editor, online html editor with css and javascript preview editor realtime');
        view()->share('meta_keyword','online html css editor free, real time html editor online, html js css editor online, online html css javascript php editor, html code online editor, online html editor with css and javascript preview editor realtime');

    	return view('front.tools.onlineEditor');
    }

    public function toolsOnlineCounter()
    {
    	view()->share('meta_title','Online Character, Letter, Word, Space & Paragraph Count Tool');
        view()->share('meta_description','character count with spaces online, online word counter tool, web word count tool, free online character counter without spaces, free online letter count, paragraph counter online web tool free');
        view()->share('meta_keyword','character count with spaces online, online word counter tool, web word count tool, free online character counter without spaces, free online letter count, paragraph counter online web tool free');
        
    	return view('front.tools.onlineCounter');
    }

    public function toolsOnlineConvertCase()
    {
        view()->share('meta_title','Online Convert Lowercase, Uppercase, Capitalized, Sentence case & Title case');
        view()->share('meta_description','convert lowercase to uppercase online, convert all uppercase to lowercase online, convert string to capitalize online, convert a string to upper lower case online, online case converter, online free lowercase converter');
        view()->share('meta_keyword','convert lowercase to uppercase online, convert all uppercase to lowercase online, convert string to capitalize online, convert a string to upper lower case online, online case converter, online free lowercase converter');
        
        return view('front.tools.onlineConvertCase');
    }

    public function toolsOnlineEncodeDecodeString()
    {
        view()->share('meta_title','Online Base64 Encode Decode String Tool');
        view()->share('meta_description','online base64 decode string, online base64 encode string, online base64 encode decode, free online base64 encoder decoder, online free tool for convert base64 string, base64 decode online tool, base64 encode online tool Here, we will give you free online tools for convert base64 encode decode string. So basically it will help to base64 string encode and decode. i added two box for input string, you can see and check demo online. i hope you will use and help you more.');
        view()->share('meta_keyword','online base64 decode string, online base64 encode string, online base64 encode decode, free online base64 encoder decoder, online free tool for convert base64 string, base64 decode online tool, base64 encode online tool Here, we will give you free online tools for convert base64 encode decode string. So basically it will help to base64 string encode and decode. i added two box for input string, you can see and check demo online. i hope you will use and help you more.');

        return view('front.tools.onlineEncodeDecodeString');
    }

    public function toolsOnlineGeneratePassword()
    {
        view()->share('meta_title','Online Password Generator Tool');
        view()->share('meta_description','we will give you free to generate secure passwords for Your Social Media Accounts, Computers, WIFI, Server, Website, Mobile App etc within a Click for Free.');
        view()->share('meta_keyword','we will give you free to generate secure passwords for Your Social Media Accounts, Computers, WIFI, Server, Website, Mobile App etc within a Click for Free.');

        return view('front.tools.toolsOnlineGeneratePassword');
    }
}
