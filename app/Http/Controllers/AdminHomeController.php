<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\PostMethod;
use App\Models\Tutorial;
use App\Models\Blog;
use App\Models\ImageUpload;
use App\Models\BlogCategory;
use Validator;
use Carbon\Carbon;
use DB;


class AdminHomeController extends AdminController
{
    public function index(Request $request)
    {
         $userCount  = User::count();
         $postCount  = PostMethod::count();
         $tutorialCount  = Tutorial::count();
         $blogCategoryCount  = BlogCategory::count();
         $blogCount  = Blog::where('is_publish','1')->count();

      
        // $searchBlogDays =  $request->searchBlogDay; 
           
        // if (empty($request->searchBlogDay)) {
        //   $blogpopular =  Blog::where('is_publish','1')->whereDate('created_at','>',Carbon::now()->subDays(1))
        //                     ->orderBy('total_view', 'desc')   // Order by the 
        //                     ->take(10)                           // Take the first 5
        //                     ->get(); 

        //     $searchBlogDays = 1;
        // }
        // elseif ($request->searchBlogDay == "all")
        // {
        //     $blogpopular =  Blog::where('is_publish','1')->orderBy('total_view', 'desc')   // Order by the 
        //                         ->take(10)                           // Take the first 5
        //                         ->get(); 
        // }else{
        //     $blogpopular =  Blog::where('is_publish','1')->whereDate('created_at','>',Carbon::now()->subDays($request->searchBlogDay))
        //                         ->orderBy('total_view', 'desc')   // Order by the 
        //                         ->take(10)                           // Take the first 5
        //                         ->get(); 
        // }
        $i = 0;
        $currentMonth = date('m');
        $currentYear = date('Y');   
        $visitor = DB::table('blogs')
                    ->select(
                        DB::raw("date(created_at) as date"),
                        DB::raw("count(id) as total_posts"))
                    ->whereRaw('YEAR(blogs.created_at) = ?',$currentYear) 
                    ->where('is_publish','1')
                    ->groupBy(DB::raw("MONTH(blogs.created_at)"))
                    ->get();
        if (!empty($request->currentYearChart)) {
            $visitor = DB::table('blogs')
                    ->select(
                        DB::raw("date(created_at) as date"),
                        DB::raw("count(id) as total_posts"))
                    ->whereRaw('YEAR(blogs.created_at) = ?',$request->currentYearChart)
                    ->where('is_publish','1')
                    ->groupBy(DB::raw("MONTH(blogs.created_at)"))
                    ->get();

        }
        $result[] = ['Date','Blog'];
        foreach ($visitor as $key => $value) {
            $monthName = Carbon::parse($value->date)->format('M');
            $result[++$key] = [$monthName, (int)$value->total_posts];
        }

        // $blogcategorychart = BlogCategory::latest()->get();

        // $result1[] = ['Name','Total'];
        // foreach ($blogcategorychart as $key => $value) {
        //     $result1[++$key] = [$value->name, count($value->CategoryConnect)];
        // }
        $blogcategorychart = '';
        return view('admin.home.home',compact('userCount','postCount','tutorialCount','blogCount','blogCategoryCount','i','blogcategorychart'))->with('visitor',json_encode($result));
    }

    public function imageUpload()
    {
        return view('admin.image.index');
    }
    public function imagestore(Request $request)
    {
        $input = $request->all();
         $validator = Validator::make($input, [
            'image'=>'required',
        ]);

        if ($validator->passes()){
            if($request->hasfile('image')){
                $imagename=$request->file('image');
                $imageName = $imagename->getClientOriginalName();
                $request->file('image')->move(public_path('/image'),$imageName);
            }
        }
        notificationMsg('success',$this->crudMessage('add','Image'));

        return redirect()->route('images.index')
                        ->withInput()
                        ->withErrors($validator);
    }
}