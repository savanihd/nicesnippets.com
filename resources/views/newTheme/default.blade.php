<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		@include('newTheme.meta')

		@include('newTheme.style')

		<link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">

		<style type="text/css">
			body, h1, .blog-post-item h2 a, ul.blog-post-info li a, .post-detail-title, .post-detail-info, h2, h4{
		    	font-family: 'Ropa Sans', sans-serif;
			}
			p, .tab-content, ul.nav-tabs li a{
				font-size: 15px;
			}
			.goog-search{
				width: 400px;
			}
			.gsc-input-box{
				height: 33px !important;
			}
			.gsc-control-cse{
				margin-top: 20px;
			}
		</style>


			<?php echo $settingsFrontData['head-tag'] ?>


		<!-- Go to www.addthis.com/dashboard to customize your tools --> 
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b751dbd74890745"></script>
	</head>

	<body class="smoothscroll enable-animation">

		<div id="wrapper">

    		@include('newTheme.header')	

			<!-- page header -->
    		@include('newTheme.pageHeader')	

			<section>
				<div class="container">
			        @yield('content')
				</div>
			</section>
			<!-- / -->

			<!-- FOOTER -->
				@include('newTheme/footer')
			<!-- /FOOTER -->

		</div>
		<!-- /wrapper -->

		<!-- SCROLL TO TOP -->
		<a href="#" id="toTop"></a>

		<!-- JAVASCRIPT FILES -->
		@include('newTheme/script')	

    	@yield('pageLevelScript')
		
		@include('newTheme.onlineScript')
	</body>
</html>