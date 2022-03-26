<!DOCTYPE html>
<html>
<head>
	@include('newTheme.meta')
	<link rel="icon" href="/image/favicon.ico">
  	<link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">
  	<link href="{{ asset('newTheme/css/live-demo.css') }}" rel="stylesheet" type="text/css" />
  	<style type="text/css">
  		.desc-p{
  			font-size: 12px;
  		}
  		iframe{
  			margin-top: 5px;
  		}
  		section{
  			height:calc(100% - 50px);
  		}
  		.btn-c{
  			    display: inline-block;
			    margin-bottom: 0;
			    font-weight: 400;
			    line-height: 1.42857143;
			    white-space: nowrap;
			    vertical-align: middle;
			    -ms-touch-action: manipulation;
			    touch-action: manipulation;
			    cursor: pointer;
			    -webkit-user-select: none;
			    -moz-user-select: none;
			    -ms-user-select: none;
			    user-select: none;
			    background-image: none;
			    border: 1px solid transparent;
			    border-radius: 4px;
			    font-size: 28px;
    font-weight: bold;
    padding: 12px 70px;
    height: auto !important;
    background: #8ab933;
    border-color: #8ab933;
    margin-top: 10px;
    font-family: 'Ropa Sans', sans-serif !important;
    color: white;
        margin-left: 25px;
  		}
  		.text-center{
  			text-align: center;
  		}
  	</style>
</head>
<body>
	<div class="top-add-section">
		{{--<div class="top-add-section-left">
			{!! $settingsFrontData['demo-top-left-add'] !!}
		</div>--}}
		<div class="top-add-section-middal">
			<a href="{{ url('/') }}">
				<img src="/image/nicesnippets.png">
			</a>
		</div>
		{{--<div class="top-add-section-right">
			{!! $settingsFrontData['demo-top-right-add'] !!}
		</div>--}}
	</div>
	<div class="left-add">
		<center>{!! $settingsFrontData['demo-left-add'] !!}</center>
	</div>
	<div class="right-add">
		<center>{!! $settingsFrontData['demo-right-add'] !!}</center>
	</div>
  	<section>
	    <h1>Live Demo - {{ $post->title }}</h1>
	    <p class="desc-p">
		    See Free Live Demo example of {{ str_limit($post->body, 300) }}
	    </p>
	    {{-- 
	    <a class="full-screen" title="Click to Full Screen">Full Screen</a>
	    <button class="clearLink" title="Click to clear all">Clear</button>
	    --}}
	    <textarea style="display: none;" id="html" placeholder="HTML" autocapitalize="off" autofocus>{{ $post->body_html }}</textarea>
	    <textarea style="display: none;" id="css" value="" placeholder="CSS" autocapitalize="off">{{ $post->body_css }}</textarea>
	    <textarea style="display: none;" id="js" value="" placeholder="JavaScript" autocapitalize="off">{{ $post->body_js }}</textarea>
	    <iframe id="preview" class="full-screen-height"></iframe>
  	</section>


  	<div class="second-section">
  		<div class="text-center">
	  		<a href="{{ url('/') }}" class="btn-c">Home</a>
	  		<a href="{{ route('post.detail',$post->slug) }}" class="btn-c">Back to Snippet</a>
	  	</div>

        @include('front.tools.liveAdds')
    </div>

  	<script type="text/javascript" src="{{ asset('newTheme/plugins/jquery/jquery-2.1.4.min.js') }}"></script>
  	<script type="text/javascript">
  		sessionStorage["html"] = $("#html").html();
  		sessionStorage["css"] = $("#css").html();
  		sessionStorage["js"] = $("#js").html();
  		console.log(sessionStorage);
  	</script>
  	<script type="text/javascript" src="{{ asset('newTheme/js/live-demo.js') }}"></script>

  	<script type="text/javascript">
  		$('.full-screen').click(function(){
  			$('textarea').toggle();
  			$('iframe').toggleClass('full-screen-height');

  			if($(this).text() == "Full Screen"){	
		       	$(this).text("Min Screen")
  			}else{
		       	$(this).text("Full Screen");
		    }   	
  		});
  	</script>
  		@include('newTheme.onlineScript')
</body>
</html>
