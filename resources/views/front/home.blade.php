@extends($frontTheme)

@section('title')
	<h1>Latest Snippets</h1>
@stop

@section('content')
<style type="text/css">
	section{
		padding-top: 40px !important;
	}
	.page-header{
		padding-top: 20px !important;
	}
	.home-desc-detail{
		margin-bottom:0px !important;
	}
</style>

<div class="callout home-desc alert alert-border blog-post-item">
	<div class="row">
		<div class="col-md-12 col-sm-12 home-desc-detail">
			<script>
			  (function() {
			    var cx = '004794909148477167645:jiygg9zjfvy';
			    var gcse = document.createElement('script');
			    gcse.type = 'text/javascript';
			    gcse.async = true;
			    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
			    var s = document.getElementsByTagName('script')[0];
			    s.parentNode.insertBefore(gcse, s);
			  })();
			</script>
			<gcse:search></gcse:search>
			<p>NiceSnippets.com provides good layouts design of snippets like profile, grid, pagination, chat, forms, buttons, model, slider, search, social, badges, controls, footer, select, calender, timeline etc. You can simple take html, css and js code and get layout of available snippets. We provide bootstrap design widget and we also provide without bootstrap snippets.</p>
		</div>
	</div>
</div>

<div class="row content-add1">
	<div class="col-md-12" align="center">
		{!! $settingsFrontData['content-add1'] !!}
	</div>
</div>

<div class="row">
	@if($posts->count())
		@foreach($posts as $post)
    		@include('front.post-box-design')
    	@endforeach
    @endif
</div>
<!-- /.row -->

<div class="row content-add1">
	<div class="col-md-12" align="center">
		{!! $settingsFrontData['content-add2'] !!}
	</div>
</div>

<!-- Pagination -->
<div class="row text-center page">
    <div class="col-lg-12">
        {{ $posts->links() }}
    </div>
</div>
<!-- /.row -->
@endsection