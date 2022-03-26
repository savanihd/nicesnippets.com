<!DOCTYPE html>
<html>
<head>
	@include('newTheme.meta')

  	<link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">
  	<link href="{{ asset('newTheme/css/live-demo.css') }}" rel="stylesheet" type="text/css" />
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
  	<section class="postZip-title">

	    <h1>Free Download Code - {{ $postZip->title }} </h1>
	    <p class="desc-p">
	    	<small>Free Download Script Code of {{ Str::limit($postZip->body, 300) }}</small><br>
	    </p>

	    <center>
		<p class="wait-c">Please Wait for Download Snippet Code : </p> <span id="countdowntimer" attr-post-slug="{{ $postZip->slug }}">20 </span>
		</center>

	    <a href="{{ route('post.detail',$postZip->slug) }}" class="full-screen btn-back" title="Click to Full Screen ">Back To Snippet</a>
	    
	    @if($postZip->is_demo == 1 )
			<a target="_blank" href="{{ route('post.demo',[$postZip->slug.'-demo.html']) }}" class="btn btn-success btn-demo demo">See Live Demo</a>
		@endif

		<ul class="ds-btn">
	        <li>
	            <a class="btn-link btn-lg btn-primary" href="{{ route('tag.pages','bootstrap-4') }}" target="_blank">
	            <span>Bootstrap 4</span></a> 
	        </li>
	        <li>
	            <a class="btn-link btn-lg btn-info" href="/forums" target="_blank">
	            <span>Ask Your Question</span></a> 
	        </li>
	        <li>
	            <a class="btn-link btn-lg btn-warning" href="{{ route('tools-online-editor') }}" target="_blank">
	            <span>Online Editor Of HTML CSS JS</span></a> 
	        </li>
	        <li>
	            <a class="btn-link btn-lg btn-success" href="{{ url('/tags') }}" target="_blank">
	            <span>Popular Tags</span></a> 
	        </li>
	        <li>
	            <a class="btn-link btn-lg btn-danger" href="{{ route('tools-online-counter') }}" target="_blank">
	            <span>Online Character Counter Tool</span></a> 
	        </li>
	        <li>
	            <a class="btn-link btn-lg btn-primary" href="{{ route('tools-online-convert-case') }}" target="_blank">
	            <span>Online Convert Case Tool</span></a> 
	        </li>
	        <li>
	            <a class="btn-link btn-lg btn-info" href="{{ route('social.network') }}" target="_blank">
	            <span>Connect With Us</span></a> 
	        </li>
	    </ul>

  	</section>
  	<div class="second-section">
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
	    var timeleft = 20;
	    var downloadTimer = setInterval(function(){
	    timeleft--;
	    document.getElementById("countdowntimer").textContent = timeleft;
		    if(timeleft <= 0){
		        clearInterval(downloadTimer);
		    }

		    if(timeleft == 0){
		    	var postSlug = $('#countdowntimer').attr('attr-post-slug');
		    	window.location.href = 'http://www.nicesnippets.com/downloadZip/'+postSlug;
		    	document.getElementById("countdowntimer").textContent = "Thank you";
		    }

	    },1000);
	</script>
	@include('newTheme.onlineScript')
</body>
</html>
