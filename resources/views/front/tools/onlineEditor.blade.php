<!DOCTYPE html>
<html>
<head>
	@include('newTheme.meta')
	<link rel="icon" href="/image/favicon.ico">
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
  	<section>
	    <h1>Online Real Time HTML CSS JS Editor with Preview</h1><br>
	    <span class="sub-title">we provide you online html js css real time editor, you can see real time preview. here we provide you three box for html, js and css code. Enjoy Code!!!</span>
	    <p class="desc-p">
	    </p>
	    <a class="full-screen" title="Click to Full Screen">Full Screen</a>
	    <button class="clearLink" title="Click to clear all">Clear</button>
	    <textarea id="html" placeholder="HTML" autocapitalize="off" autofocus></textarea>
	    <textarea id="css" value="" placeholder="CSS" autocapitalize="off"></textarea>
	    <textarea id="js" value="" placeholder="JavaScript" autocapitalize="off"></textarea>
	    <iframe id="preview"></iframe>
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
