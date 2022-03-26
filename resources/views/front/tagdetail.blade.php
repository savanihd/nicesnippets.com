@extends($frontTheme)

@section('content')
<style type="text/css">
    section{
        padding-top: 40px !important;
    }
    .page-header{
        padding-top: 20px !important;
    }
    .tag-title{
        text-transform: capitalize;
    }
</style>

<div class="callout home-desc alert alert-border">
    <div class="row">
        <div class="col-md-12 col-sm-12 home-desc-detail"><!-- left text -->
            <p>NiceSnippets.com provides good layouts design of {{ $tagname->tag }} snippets like profile, grid, pagination, chat, forms, buttons, model, slider, search, social, badges, controls, footer, select, calender, timeline etc. You can simple take html, css and js code and get layout of available snippets. We provide bootstrap design widget and we also provide without bootstrap snippets.</p>
        </div>
    </div>
</div>

<div class="row content-add1">
    <div class="col-md-12" align="center">
        {!! $settingsFrontData['content-add1'] !!}
    </div>
</div>

<!-- Page Header -->
@section('title')
        @if($tagname)
    	    <h1 class="tag-title">
        		{{ $tagname->tag }}
            </h1>
    	@else
    		this tag not found
    	@endif
@stop
<!-- /.row -->
<!-- Projects Row -->
<div class="row">
	@if($tagPages->count())
		@foreach($tagPages as $post)
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
<div class="row text-center">
    <div class="col-lg-12">
        {{ $tagPages->links() }}
    </div>
</div>
<!-- /.row -->
@endsection