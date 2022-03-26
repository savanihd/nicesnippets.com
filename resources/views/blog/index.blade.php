@extends('newBlogTheme.default')

@section('style')
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('newTheme/css/category.css') }}"> -->
<style type="text/css">
	.category-list-top h3{
		letter-spacing:1px;
		padding-bottom:2px;
	}
	.category-list-top-home{
		background-color: transparent;
		/*border-bottom:4px solid #008B8B;*/
		border-bottom:3px solid #008B8B;
		border-radius: 0px 20px 0px 20px;
	}
	.heder-title-cat{
		padding-left:15px;
		border-radius: 10px 10px 0px 0px;
		background-color: transparent;
	}
	.nicesnippets-blog{
		/*background-color:#fff;*/
		border-radius: 0px 20px 0px 20px;
		border-bottom:3px solid #008B8B;
	}
	.content-part{
		padding:0px;
	}
	.blog-head .blog-box{
		border-radius:10px !important;
		box-shadow: 1px 1px 6px #d2d2d2;
		transition: all 1s;
	    border-bottom:3px solid #fff;
	}	
	.blog-head .blog-box:hover{
	    transition: all .5s;
	    transform : translateY(-10px);
	    border-bottom:3px solid #008B8B;
	}
	.blog-head .blog-box:hover h5{
	    text-decoration: none !important;
	}
	.blog-box img{
		border-radius:10px 10px 0px 0px;
	}
	.content{
		padding:0px 15px;
	}
	.content-part h2{
		padding:15px 0px !important;
	}
	::-webkit-scrollbar {
	  	width:7px;
	  	height: 15px;
	}
	::-webkit-scrollbar-track-piece {
	  	background-color: #c2d2e4;
	}
	::-webkit-scrollbar-thumb:vertical {
	  	border-radius:10px;
	  	height: 30px;
	  	background-color:#008B8B;
	}
	.ribbon {
		position: relative;
		margin-bottom: 30px;
		background-size: cover;
		text-transform: uppercase;
		color: white;
	}
	.ribbon3 {
		width:118px;
	    height:30px;
	    line-height:30px;
	    letter-spacing:2px;
	    padding-left: 15px;
	    font-weight: 600;
	    position: absolute;
	    left:-25px;
	    font-size:15px;
	    top:10px;
	    background:#008B8B;
	    text-shadow: 7px 2px 6px #000;
	}
	.ribbon3:before, .ribbon3:after {
		content: "";
		position: absolute;
	}
	.ribbon3:before {
		height: 0;
		width: 0;
		top: -8.5px;
		left: 0.1px;
		border-bottom: 9px solid black;
		border-left: 9px solid transparent;
	}
	.ribbon3:after{
		height: 0;
		width: 0;
		right: -14.5px;
		border-top:15px solid transparent;
		border-bottom:15px solid transparent;
		border-left:14px solid #008B8B;
	}
	.category-list-top .category-part .tag::after{
		background:#fff !important;
	}
</style>
@endsection

@section('heading')
	@if(!isset($_GET['page']) || $_GET['page'] == 1)
	  	<div class="content-part nicesnippets-blog" style="margin-bottom: 20px;">
	    	<div class="row content">
		      	<div class="col-md-12">
		          <h2 class="m-0 p-2 pt-3">NiceSnippets Blog</h2>
		      	</div>
		      	<div class="col-md-12">
		          <p>NiceSnippets Blog provides you latest Code Tutorials on PHP, Laravel, Codeigniter, JQuery, Node js, React js, Vue js, PHP, and Javascript. Mobile technologies like Android, React Native, Ionic etc.</p>
		      	</div>
	    	</div>
	  	</div>
	@endif
	@if(!isset($_GET['page']) || $_GET['page'] == 1)
	<div class="col-md-12 category-list-top category-list-top-home">
        <div class="col-md-12 heder-title-cat" style="margin-bottom:10px;">
        	<div class="ribbon">
            	<span class="ribbon3">Category</span>
        	</div>
        </div>
        <div class="col-md-12 hed-sub-text category-part">
              <ul class="fa-ul tags">
                @foreach($latestCategory as $key => $value)
                  <li><span class="fa-li"></span><a href="{{ route('blog.cat',$value->slug) }}" target="_blank" class="tag">{{ $value->name }}</a>
                  </li>
                @endforeach()
              </ul>
        </div>
    </div>
    @endif
	@if(!isset($_GET['page']) || $_GET['page'] == 1) 
	  	<div class="row">
	    	<div class="col-md-12">
	      		<h2 style="margin-bottom: 20px;" class="text-center"> <i class="fa fa-hand-o-right" aria-hidden="true"></i><b> Latest Blog </b><i class="fa fa-hand-o-left" aria-hidden="true"></i></h2>
	    	</div>
	  	</div>
	@endif
@endsection

@section('content')
@if($latestBlog->count())
	@foreach($latestBlog as $key => $value)
		<div class="col-md-6 pm-0 blog-head">
			<a href="{{ route('blog.detail',$value->slug) }}" class="text-dark">
				<div class="card mb-4 blog-box">
					<div class="card-header p-0">
						@if(!empty($value->image))
							<img src="{{ asset('/upload/blog/'.$value->image)}}" alt="{{ $value->title }}">
						@else
							<img src="{{ asset('/image/defaltimgblog.png')}}" alt="{{ $value->title }}">
						@endif
					</div>
					<div class="card-body p-3">
					 <div class="row">
					 	{{--<div class="col-md-3 col-sm-6">
					 		<span class="badge badge-success"><i class="fa fa-eye"></i> {{ $value->total_view }}</span>
					 	</div>--}}
					 	<div class="col-md-3 col-sm-6">
					 		<span class="badge badge-primary"><i class="fa fa-clock-o"></i> &nbsp;{{ $value->created_at->format('d-m-Y') }}</span>
					 	</div>
					 	<div class="col-md-12 mt-3 blog-title">
					 		<h5>{{ $value->title }}</h5>
					 	</div>
					 	<div class="col-md-12">
					 		 <p>{{ strip_tags(Str::limit($value->body,160)) }}</p>
					 	</div>
					 </div>	
					</div>
				</div>
			</a>
		</div>
	@endforeach
@endif
<div class="col-md-6 offset-md-4 p-0 pl-5 text-center">{{ $latestBlog->links('vendor.pagination.bootstrap-4') }}</div>
@endsection
