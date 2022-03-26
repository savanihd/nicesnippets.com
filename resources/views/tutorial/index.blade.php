<!DOCTYPE html>
<html>
<head>
	@include('newTheme.meta')
	<link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('newTheme/css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link href="{{ asset('newTheme/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('newTheme/css/tutorialCustom.css') }}" rel="stylesheet" type="text/css" />
	<style type="text/css">
		.card .heading{
			background: #d7d7d7;
		}
		.card-box .card-header{
			background: #c1c1c1;
			cursor: pointer;
		}
	</style>
</head>
<body> 
	<!-- Header start	 -->
		@include('tutorial.include.header')
	<!-- Header end	 -->
    <div class="row-fluid contant">
        <div class="col-md-2 col-xs-2 left-side">
            <div class="sidebar-nav-fixed"> 
                <ul class="nav">
                    <li class="nav-header">Tools</li>
                    <li><a href="{{ route('tools-online-generate-password') }}" target="_blank">Online Generate Password</a></li>
                    <li><a href="{{ route('tools-online-editor') }}" target="_blank">Online Editor</a></li>
                    <li><a href="{{ route('tools-online-counter') }}" target="_blank">Online Counter</a></li>
                    <li><a href="{{ route('tools-online-convert-case') }}" target="_blank">Online Convert Case</a></li>
                    <li><a href="{{ route('tools-online-encode-decode-string') }}" target="_blank">Online Encode Decode String</a></li>
                </ul> 
            </div>
            <!--/sidebar-nav-fixed -->
        </div>
        <!--/span-->
        <div class="col-md-10 col-md-offset-2 col-xs-offset-2 col-xs-10 right-side">
            <div class="row">
            	<div class="col-md-8">
            		<section class="card">
			            <div class="card-header heading">
			              <h4 class="card-title">Free Script Tutorials</h4>
			            </div>
			            <div class="card-content">
			              <div class="card-body">
			    			<div class="row">
					            @foreach($languageData as $key => $value)
			    				<div class="col-md-4">
			    					<a href="{{ isset($value->tutorialSlug) ? route('tutorialDetails',[$value->slug,$value->tutorialSlug]) : route('tutorial') }}">
				            			<section class="card text-center card-box">
								            <div class="card-header">
								              <h4 class="card-title">{{ $value->name }}</h4>
								            </div>
								            <div class="card-content">
								              <div class="card-body">
								              	<div class="card-image">
								              		<img src="/upload/language/{{ $value->image }}" height="100px" width="120px"><br><br>
								              	</div>
								                <div class="card-text">
								                  <p>Example, Demo & Source Code</p>
								                </div>
								              </div>
								            </div>
							        	</section>
							        </a>
			    				</div>
					            @endforeach
			    			</div>            
			              </div>
			            </div>
			        </section>
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
	 <script type="text/javascript">
	 	$(document).ready(function() {
	 		var height = $(window).height();
	 		height = height - 50;
	 		$('.left-side').css('height',height+'px');
	 	});
	 </script>
</body>
</html>