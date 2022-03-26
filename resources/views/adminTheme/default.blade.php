<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="{{ asset('/image/imgpsh_fullsize.png') }}" type="image/gif" sizes="16x16">
  <meta name="_token" content="{{ csrf_token() }}">
  		@include('adminTheme.headerStyle')
        @yield('style')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
	  	<!-- header start -->
	  		@include('adminTheme.header')
	  	<!-- header end -->
	   	<!-- left sidebar start -->
	  		@include('adminTheme.leftSidebar')
	  	<!-- left sidebar end -->

	  	<div class="content-wrapper">
            @include('adminTheme.alert')
	      	@yield('content')
	  	</div>

	  	<!-- footer start -->
	  		@include('adminTheme.footer')
	  	<!-- footer end -->
	  	<div class="control-sidebar-bg"></div>
	</div>
	@include('adminTheme.footerScript')
    @yield('script')
</body>
</html>
