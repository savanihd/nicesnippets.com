@extends($frontTheme)

@section('title')
	<!-- <h3 class="post-detail-heading">Snippet in detail</h3> -->
	<h1 class="blog-post-title post-detail-title">{{ $post->title }}</h1>
	<ul class="blog-post-info list-inline post-detail-info">
		<li>
			<a href="#">
				<i class="fa fa-clock-o"></i> 
				<span class="font-lato">{{ date('M d, Y', strtotime($post->created_at)) }}</span>
			</a>
		</li>
		<li>
			<a href="#">
				<i class="fa fa-user"></i> 
				<span class="font-lato">NiceSnippets</span>
			</a>
		</li>
		<li>
			<a href="#">
				<i class="fa fa-eye"></i> 
				<span class="font-lato">{{ $post->total_view }}</span>
			</a>
		</li>
	</ul>
@stop

@section('content')
<script src="{{ asset('newTheme/js/ace/ace.js') }}"></script>
<script type="text/javascript">
	function setEditorOptions(editor, type){
        editor.setTheme("ace/theme/clouds");
        editor.setHighlightActiveLine(false);
        editor.getSession().setMode("ace/mode/"+type);
    };
</script>
<style type="text/css">
	section.page-header.page-header-xs{
		padding-top: 6px !important;
		padding-bottom: 0px !important;
	}
	.html-div{
		border: 2px solid #ccc;
    	border-radius: 5px;
    	box-sizing: border-box;
    	height: 500px;
    	padding: 0;
    	top: 0;
    	width: 100%;display: block;
	}
	section{
		padding-top: 40px !important;
	}
	.page-header{
		padding-top: 20px !important;
	}
	.btn-demo,.btn-download{
		font-size: 28px;
		font-weight: bold;
		padding: 25px 70px;
		height: auto !important;
		background: #8ab933;
		border-color: #8ab933;
		margin-top: 25px;
	}
	.btn-download{
		margin-left: 15px;
	}
	.random-blog{
		margin-top: 30px;
	}
	.blog-post{
		margin-bottom: 5px;
		font-size: 17px;
	}
	.blog-post a{
		color: #007bff;
	    text-decoration: none;
	    background-color: transparent;
	}
	@media (max-width: 360px) {
		.btn-download{
			margin-left: 0px;
		}
		.sub-section-main .type-wrap{
			height: auto;
		}
	}

</style>

<!-- Page Header -->
<div class="row">
	<!-- LEFT -->
	<div class="col-md-8 col-sm-8 col-xs-12">
		
        <div>
			<p class="post-desc">{!! nl2br($post->body) !!}</p><br/>

			<div style="padding: 10px;">
		  		@if(!empty($post->path))
					<center><img class="img-responsive" src="{{ $post->path }}" style="width:600px;"></center>
				@else
					<center><img class="img-responsive" src="http://placehold.it/700x400" alt=""></center>
				@endif
	  		</div>

			<div class="row">
				<div class="col-md-12 content-add1-post" align="center">
					{!! $settingsFrontData['content-add1'] !!}
				</div>
			</div>

			<!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
			  	<li role="presentation" class="active"><a href="#layout" aria-controls="layout" role="tab" data-toggle="tab">Layout</a></li>
			    <li role="presentation" ><a href="#home" aria-controls="home" role="tab" data-toggle="tab">HTML Code</a></li>
			    @if(!empty($post->body_css))
			    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">CSS Code</a></li>
			    @endif
			    @if(!empty($post->body_js))
			    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">JS Code</a></li>
			    @endif
			  </ul>
			  
			  <!-- Tab panes -->
			  <div class="tab-content">
			  	<div role="tabpanel" class="tab-pane active" id="layout">
			  		<textarea hidden id="html" placeholder="HTML" autocapitalize="off" autofocus>{{ $post->body_html }}</textarea>
				    <textarea hidden id="css" value="" placeholder="CSS" autocapitalize="off">{{ $post->body_css }}</textarea>
				    <textarea hidden id="js" value="" placeholder="JavaScript" autocapitalize="off">{{ $post->body_js }}</textarea>
	    			<iframe id="preview" style="width: 100%;height: 400px;"></iframe>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="home">
				    <div id="editor-html" class="html-div">{{ $post->body_html }}</div>
				    <script type="text/javascript">
						var htmleditor = ace.edit("editor-html");
					    setEditorOptions(htmleditor,'html');
				    </script>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="profile">
			    	<div id="editor-css" class="html-div">{{ $post->body_css }}</div>
				    <script type="text/javascript">
						var htmleditor = ace.edit("editor-css");
					    setEditorOptions(htmleditor,'css');
				    </script>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="messages">
			    	<div id="editor-js" class="html-div">{{ $post->body_js }}</div>
				    <script type="text/javascript">
						var htmleditor = ace.edit("editor-js");
					    setEditorOptions(htmleditor,'javascript');
				    </script>
			    </div>
			  </div>
		</div>

		<!-- <div class="row">
			<div class="col-md-12 col-xs-12 text-center">
				@if($post->is_demo == 1 )
					<a target="_blank" href="{{ route('post.demo',[$post->slug.'-demo.html']) }}" class="btn btn-success btn-demo">See Live Demo</a>
				@endif

				@if($post->is_download == 1)
					<a target="_blank" href=" {{ route('postZip.demo',[$post->slug.'-Free-Download.html']) }} " class="btn btn-success btn-download">Download Zip</a>
				@endif
			</div>
		</div> -->

		<div class="row">
          <form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open(‘https://feedburner.google.com/fb/a/mailverify?uri=Nicesnippets, ‘popupwindow’, ‘scrollbars=yes,width=550,height=520’);return true">
            <div class="col-md-10 col-md-offset-1 col-xs-12">
            	<div class="sub-section-main">
	          		<div class="section-main">
						<p class="sub-text">Please Subscribe Your Email Address, We Will Notify You When Add New Snippet:</p>
		                <div class="input-group">
		                    <input type="hidden" value="Nicesnippets" name="uri"/>
		                    <input type="hidden" name="loc" value="en_US"/>
		                    <input type="text" name="email" class="form-control" placeholder="Enter Your Email">
		                    <span class="input-group-btn">
		                        <button type="submit" class="btn btn-danger subscribe-btn"><strong>Subscribe</strong></button>
		                    </span>
		                </div>
	              	</div>
            	</div>
			</div>
          </form>
        </div>
		
		<div class="divider divider-dotted" style="margin: 20px 0px;"></div>

		<div class="row">
			<div class="col-md-12 add2-post" align="center">
				{!! $settingsFrontData['content-add2'] !!}
			</div>
		</div><br>

		<!-- Share post -->
		<div class="row">
		    <div class="col-md-12 post-share" align="center"><br><br>
		        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
				    <a class="a2a_button_facebook a2a_counter"></a>
				    <a class="a2a_button_linkedin a2a_counter"></a>
				    <a class="a2a_button_tumblr a2a_counter"></a>
				    <a class="a2a_button_reddit a2a_counter"></a>
				    <a class="a2a_dd a2a_counter" href="https://www.addtoany.com/share"></a>
				</div>
			<script async src="https://static.addtoany.com/menu/page.js"></script>
		    </div>
		</div>
		<!-- TAGS -->
		<div class="row">
			<div class="col-md-12 col-xs-12 tags-postdetail-page">
			<strong><i class="fa fa-tags" aria-hidden="true"></i> Tags:-</strong>
			@if(!empty($postTags))
				@foreach($postTags as $key=>$value)
					<a href="{{ route('tag.pages',str_slug($value->tag)) }}" class="tag">
						<span class="txt">{{ $value->tag }}</span><span class="num">{{ $value->totalPost }}</span>
				    </a>
				@endforeach
			@endif
			</div>
		</div>

		@if(isset($settingsFrontData['detail-add']))
			<div class="row">
				<div class="col-md-12 col-xs-12 add2-post post-detail-add" align="center">
					{!! $settingsFrontData['detail-add'] !!}
				</div>
			</div><br>
		@endif
		
		{{--
		<div class="col-md-12 col-xs-12 letest-post post">
			<h2 class="letest-post-title">Related Post</h2>
		</div>
		<div class="row latest-post-main">
			@if($relatedpost->count())
				@foreach($relatedpost as $post)
		    		@include('front.post-box-design')
				@endforeach
			@endif
		</div>
		--}}

		<!-- Random post -->
		<div class="random-post">
			<h2 class="random-post-title">Random Post</h2><br>
				@if($randompost->count())
					@foreach($randompost as $post)
			    		<ul>
				    		<li>
				    			<a href="{{ route('post.detail',$post->slug) }}">{{ Str::limit($post->title) }}</a>
				    		</li>
			    		</ul>
					@endforeach
				@endif
		</div>

		<!-- Random Blog -->
		<div class="random-post random-blog">
			<h2 class="random-post-title">Random Blog</h2><br>
				@if($randomblogs->count())
					@foreach($randomblogs as $blog)
			    		<ul>
				    		<li>
				    			<a href="{{ route('blog.detail',$blog->slug) }}" target="_blank">{{ Str::limit($blog->title) }}</a>
				    		</li>
			    		</ul>
					@endforeach
				@endif
		</div>
	</div>
	<!-- RIGHT -->
	<div class="col-md-4 col-sm-4 col-xs-12 bg-sidebar">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<h3 class="size-16 margin-bottom-20">Blog Post</h3>
				@if($randomblogpost->count())
			    	<ul>
						@foreach($randomblogpost as $blogpost)
					    		<li class="blog-post">
					    			<a href="{{ route('blog.detail',$blogpost->slug) }}" target="_blank">{{ Str::limit($blogpost->title) }}</a>
					    		</li>
						@endforeach
			    	</ul>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<h3 class="size-16 margin-bottom-20">Do You Like ?</h3>
				{!! $settingsFrontData['related-ads-2'] !!}
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 text-center">
				{!! $settingsFrontData['sidebar-add'] !!}
			</div>
		</div>

		<!-- RIGHT -->
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="Tags bg-sidebar">
					<h3 class="size-16 margin-bottom-20"><i class="fa fa-tags" aria-hidden="true"></i> TAGS</h3>
					<div class="margin-bottom-50">
						@foreach($tagPostList as $key=>$value)	
								<a href="{{ route('tag.pages',$value->slug) }}" class="tag post-tag-right">
									<!-- <span class="txt">{{ $value->tag }}</span><span class="num">{{ $value->totalPost }}</span> -->
									<button type="button" class="btn btn-info btn-sm margin-bottom-6">{{ $value->tag }} <span class="badge">{{ $value->totalPost }}</span></button>
								 </a>
						@endforeach
						<br>
						<!-- <br><a href="{{ url('/tags') }}">More...</a> -->
						<!-- <a href="{{ url('/tags') }}" class="btn btn-reveal btn-default pull-left post-more-tag-btn">
					        <i class="fa fa-plus"></i>
					        <span>More Tags...</span>
					    </a> -->
					    <a href="{{ url('/tagslist') }}" class="btn btn-success pull-left post-more-tag-btn">
					        <i class="fa fa-plus"></i>
					        More Tag
					    </a>
					</div>	
				</div>
				
				<div class="Recent bg-sidebar">
					<h3 class="size-16 margin-bottom-0 margin-top-10">Recent</h3>
					@foreach($latestpost as $post)
						<div class="row tab-post"><!-- post -->
									{{--
							<div class="col-md-5 col-sm-3 col-xs-12 recent-post-img-main">
								<a a href="{{ route('post.detail',$post->slug) }}" title="{{ $post->title }}">
							        @if(!empty($post->path))
							            <figure class="margin-bottom-10 recent-post-image">
							                <img class="img-responsive" src="{{ getPostImagePath($post->path) }}" alt="{{ $post->title }}">
							            </figure>
							        @else
							            <figure class="margin-bottom-10 recent-post-image">
							                <img class="img-responsive" src="{{ asset('/image/img_default.png') }}" alt="{{ $post->title }}">
							            </figure>
							        @endif
							    </a>    
							</div>
							        --}}
							<div class="col-md-12 col-sm-12 col-xs-12 recent-post-title">
								<a href="{{ route('post.detail',$post->slug) }}" title="{{ $post->title }}"><i class="fa fa-arrow-right"></i> {{ $post->title }}</a>
							</div>
						</div><!-- /post -->
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('pageLevelScript')
<script type="text/javascript" src="{{ asset('newTheme/plugins/jquery/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('newTheme/js/live-demo.js') }}"></script>
<script type="text/javascript">
	sessionStorage["html"] = $("#html").html();
	sessionStorage["css"] = $("#css").html();
	sessionStorage["js"] = $("#js").html();
	console.log(sessionStorage);
</script>
@endsection