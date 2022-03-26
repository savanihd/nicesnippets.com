@extends($frontTheme)

@section('title')
	<h1 class="blog-post-title post-detail-title">Nicesnippets.com - Connect with us on Social Network</h1>
	<p></p>
@stop

@section('content')
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
	<div class="col-md-8 col-sm-9 col-xs-12">
		<div class="row">
			<div class="col-md-12">
				<p>Hi, Thank you Developer
<br/>
<br/>
I like to see you are in this page. In social page i display all social sites pages of nicesnippets.com and we would like if you join with us on our pages. So you can keep touch with us on social network. Here is listed social network pages of facebook social media page, twitter social network page and google plus social media page. 
<br/>
<br/>
I also added email subscriber box that will help to notify via email when we added new on our website.
<br/>
<br/>
Thank you....</p>
			</div>
		</div>

        <div class="row">
          <form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open(‘http://feedburner.google.com/fb/a/mailverify?uri=Nicesnippets, ‘popupwindow’, ‘scrollbars=yes,width=550,height=520’);return true">
            <div class="col-md-12 col-xs-12">
            	<div class="sub-section-main">
	          		<div class="section-main">
						<div id="typed-strings">
						    <p>Please Subscribe Your Email Address, We Will Notify You When Add New Snippet:</p>
						</div>
						<div class="type-wrap"></div>
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

        <br/>
        <br/>
        
		<div class="row">
			<div class="col-md-6">
				<div class="facebook-bg">
					<h4 class="letter-spacing-1">Connect with us on Facebook</h4>
		            <div id="fb-root"></div> 
		            <script>
		              (function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12&appId=1023676864409708&autoLogAppEvents=1'; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));
		            </script>
		            <div class="fb-page" data-height="350" data-href="https://www.facebook.com/NiceSnippets-593421841011199" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/NiceSnippets-593421841011199" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/NiceSnippets-593421841011199">NiceSnippets</a></blockquote></div>
				</div>
			</div>
			<div class="col-md-6 twitter-bg">
				<h4 class="letter-spacing-1">Connect with us on Twitter</h4>
          		<a class="twitter-timeline" data-height="350" href="https://twitter.com/VimalKashiyani">Tweets by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
		</div>
		<!-- Share post -->
		<div class="row">
		    <div class="col-md-12 post-share" align="center" style="margin-top: 15px;"><br><br>
		        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
				    <a class="a2a_button_facebook a2a_counter"></a>
				    <a class="a2a_button_pinterest a2a_counter"></a>
				    <a class="a2a_button_linkedin a2a_counter"></a>
				    <a class="a2a_button_tumblr a2a_counter"></a>
				    <a class="a2a_button_reddit a2a_counter"></a>
				    <a class="a2a_dd a2a_counter" href="https://www.addtoany.com/share"></a>
				</div>
			<script async src="https://static.addtoany.com/menu/page.js"></script>
		    </div>
		</div><br>

		@if(isset($settingsFrontData['detail-add']))
			<div class="row">
				<div class="col-md-12 col-xs-12 add2-post post-detail-add" align="center">
					{!! $settingsFrontData['detail-add'] !!}
				</div>
			</div><br>
		@endif
	</div>
	<!-- RIGHT -->
	<div class="col-md-4 col-sm-4 col-xs-12 bg-sidebar">
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
							<div class="col-md-7 col-sm-9 col-xs-12 recent-post-title">
								<a href="{{ route('post.detail',$post->slug) }}" title="{{ $post->title }}">{{ $post->title }}</a>
							</div>
						</div><!-- /post -->
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection