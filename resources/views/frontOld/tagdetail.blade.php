@extends('layouts.default')

@section('content')

<div style="background: #e1e1e1;padding: 20px;">
<p>NiceSnippets.com provides good layouts design of {{ $tagname->tag }} snippets like profile, grid, pagination, chat, forms, buttons, model, slider, search, social, badges, controls, footer, select, calender, timeline etc. You can simple take html, css and js code and get layout of available snippets. We provide bootstrap design widget and we also provide without bootstrap snippets.</p>
</div>

<!-- Page Header -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
        	@if($tagname)
        		Tag :- {{ $tagname->tag }}
        </h1>
        	@else
        		this tag not found
        	@endif
    </div>
</div>
<!-- /.row -->
<!-- Projects Row -->
<div class="row">
	@if($tagPages->count())
		@foreach($tagPages as $tagPage)
	    <div class="col-md-4 portfolio-item">
	        <div class="thumbnail">
		        <a a href="{{ route('post.detail',$tagPage->slug) }}" title="{{ $tagPage->title }}">
		           @if(!empty($tagPage->path))
						<img class="img-responsive" src="{{ getPostImagePath($tagPage->path) }}" style="width:400px;height: 205px" alt="{{ $tagPage->title }}">
					@else
		            	<img class="img-responsive" src="http://placehold.it/700x400" alt="{{ $tagPage->title }}">
					@endif
		        </a>
		        <h3>
		            <a href="{{ route('post.detail',$tagPage->slug) }}" title="{{ $tagPage->title }}">{{ Str::limit($tagPage->title,55) }}</a>
		        </h3>
		        <p>{{ Str::limit($tagPage->body,90) }}</p>
	        </div>
	    </div>
    	@endforeach
    @endif
</div>
<!-- /.row -->

<hr>
<!-- Pagination -->
<div class="row text-center">
    <div class="col-lg-12">
        {{ $tagPages->links() }}
    </div>
</div>
<!-- /.row -->
@endsection