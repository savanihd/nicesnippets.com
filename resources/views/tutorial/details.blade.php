<!DOCTYPE html>
<html>
<head>
	@include('newTheme.meta')
	<link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('newTheme/css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link href="{{ asset('newTheme/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('newTheme/css/tutorialCustom.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('newTheme/css/prism.css') }}" rel="stylesheet" type="text/css" />
</head>
<body> 
	
	<!-- Header start	 -->
		@include('tutorial.include.header')
	<!-- Header end	 -->	
    <div class="row-fluid contant">
        <div class="col-md-2 col-xs-2 left-side">
            <div class="sidebar-nav-fixed"> 
                <ul class="nav">
                    <li class="nav-header">{{ $tutorialData->languageName }}</li>
                    @foreach($tutorialList as $key => $value)
                    	<li class="{{ Request::is($value->languageSlug.'/'.$value->slug) ? 'active' : '' }}"><a href="{{ route('tutorialDetails',[$value->languageSlug , $value->slug]) }}">{{ $value->topic_name }}</a></li>
                    @endforeach
                </ul> 
            </div>
            <!--/sidebar-nav-fixed -->
        </div>
        <!--/span-->
        <div class="col-md-10 col-md-offset-2 col-xs-offset-2 col-xs-10 right-side">
            <div class="row">
            	<div class="col-md-8">
            		<section class="card">
			            <div class="card-header">
			              <h4 class="card-title">{{ $tutorialData->topic_name }}</h4>
			            </div>
			            <div class="card-content">
			              <div class="card-body">
			                <div class="card-text description">
			                	<p>{!! nl2br($tutorialData->description) !!}</p>
			                </div>
			              </div>
			            </div>
			        </section>
			        @if(!empty($tutorialData->example_demo))
				        <section class="card">
				            <div class="card-header">
				              <h4 class="card-title">Example Demo</h4>
				            </div>
				            <div class="card-content">
				              <div class="card-body">
				                <div class="card-text">
				                  <p>{!! $tutorialData->example_demo !!}</p>
				                </div>
				              </div>
				            </div>
				        </section>
			        @endif
			        @if(!empty($tutorialData->js_code))
				        <section class="card">
				            <div class="card-header">
				              <h4 class="card-title">Js Code</h4>
				            </div>
				            <div class="card-content">
				              <div class="card-body">
				                <div class="card-text">
				                	<pre><code class="language-js">{{ $tutorialData->js_code }}</code></pre>
				                </div>
				              </div>
				            </div>
				        </section>
			        @endif
			        @if(!empty($tutorialData->html_code))
				        <section class="card">
				            <div class="card-header">
				              <h4 class="card-title">Html Code</h4>
				            </div>
				            <div class="card-content">
				              <div class="card-body">
				                <div class="card-text">
				                  <pre><code class="language-html">{{ $tutorialData->html_code }}</code></pre>
				                </div>
				              </div>
				            </div>
				        </section>
			        @endif
			        @if(!empty($tutorialData->css_code))
				        <section class="card">
				            <div class="card-header">
				              <h4 class="card-title">Css Code</h4>
				            </div>
				            <div class="card-content">
				              <div class="card-body">
				                <div class="card-text">
				                	<pre><code class="language-css">{{ $tutorialData->css_code }}</code></pre>
				                </div>
				              </div>
				            </div>
				        </section>
			        @endif
            	</div>
            	@include('tutorial.include.rightSidebar')
            </div> 
            <!-- Footer start -->
            	@include('tutorial.include.footer')
            <!-- Footer end -->
        </div>
        <!--/span--> 
    </div>
    <!--/row-->  
	 <script src="{{ asset('/adminTheme/bower_components/jquery/dist/jquery.min.js') }}"></script>
	 <script src="{{ asset('/adminTheme/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	 <script src="{{ asset('/newTheme/js/prism.js') }}"></script>
	 <script type="text/javascript">
	 	$(document).ready(function() {
	 		var height = $(window).height();
	 		height = height - 50;
	 		$('.left-side').css('height',height+'px');
	 	});
	 </script>
</body>
</html>