@extends('layouts.default')

@section('content')

<div class="home-desc">
<p>NiceSnippets.com provides good layouts design of snippets like profile, grid, pagination, chat, forms, buttons, model, slider, search, social, badges, controls, footer, select, calender, timeline etc. You can simple take html, css and js code and get layout of available snippets. We provide bootstrap design widget and we also provide without bootstrap snippets.</p>
</div>

<!-- Page Header -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Latest Snippets</h1><hr>
    </div>
</div>
<!-- /.row -->
<!-- Projects Row -->
<div class="row">
	@if($posts->count())
		@foreach($posts as $post)
    		@include('front.post-box-design')
    	@endforeach
    @endif
</div>
<!-- /.row -->

<hr>
<!-- Pagination -->
<div class="row text-center">
    <div class="col-lg-12">
        {{ $posts->links() }}
    </div>
</div>
<!-- /.row -->
@endsection