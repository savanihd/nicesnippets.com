<!DOCTYPE html>
<head>
@include('blogTheme.meta')
@include('blogTheme.style')
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
@yield('style')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b751dbd74890745"></script>
</head>
<body class="smoothscroll enable-animation">
	<div id="wrapper">
		@include('blogTheme.header')	
		@include('blogTheme.pageHeader')	
		<section>
			<div class="container">
		        @yield('content')
			</div>
		</section>
		@include('blogTheme/footer')
	</div>
	<a href="#" id="toTop"></a>
	@include('blogTheme/script')	
	@yield('pageLevelScript')
	@include('blogTheme.onlineScript')
</body>
</html>