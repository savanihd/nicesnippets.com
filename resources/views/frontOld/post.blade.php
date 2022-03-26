@extends('layouts.default')

@section('title')
{{ $post->title }}
@stop

@section('content')
<script src="//cdnjs.cloudflare.com/ajax/libs/ace/1.2.5/ace.js"></script>
<script type="text/javascript">
	function setEditorOptions(editor, type){
        editor.setTheme("ace/theme/clouds");
        editor.setHighlightActiveLine(false);
        editor.getSession().setMode("ace/mode/"+type);
    };
</script>
<style type="text/css">
	.html-div{
		border: 2px solid #ccc;
    	border-radius: 5px;
    	box-sizing: border-box;
    	height: 500px;
    	padding: 0;
    	top: 0;
    	width: 100%;display: block;
	}
</style>
<!-- Page Header -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ $post->title }}</h1>
        <div class="post-info">
	        <h5><strong>Created date : </strong>{{ date('d-m-Y', strtotime($post->created_at)) }}</h5>
	        <h5><strong>Total View : </strong>{{ $post->total_view }}</h5>
	        <div class="post-tag-list">
				<?php
				    $tagArray = explode(",",$post->tagList); 
				    $tagSlugArray = explode(",",$post->tagSlugList);
				?>
				@foreach($tagArray as $key=>$value)
				    <a href="{{ route('tag.pages',$tagSlugArray[$key]) }}"><i class="fa fa-tags"></i>{{ $value }}</a>
				@endforeach
			</div>
		</div>
    </div>
</div>
<!-- /.row -->

<!-- Projects Row -->
<div class="row">
	<div class="col-md-12">
		<p>{!! $post->body !!}</p><br/>
		<div>
			<!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
			  	<li role="presentation" class="active"><a href="#layout" aria-controls="layout" role="tab" data-toggle="tab">Layout</a></li>
			    <li role="presentation" ><a href="#home" aria-controls="home" role="tab" data-toggle="tab">HTML Code</a></li>
			    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">CSS Code</a></li>
			    @if(!empty($post->body_js))
			    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">JS Code</a></li>
			    @endif
			  </ul>
			  
			  <!-- Tab panes -->
			  <div class="tab-content">
			  	<div role="tabpanel" class="tab-pane active" id="layout">
			  		<div style="padding: 10px;">
				  		@if(!empty($post->path))
							<img class="img-responsive" src="{{ $post->path }}" style="width:600px;">
						@else
							<img class="img-responsive" src="http://placehold.it/700x400" alt="">
						@endif
			  		</div>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="home">
				    <div id="editor-html" class="html-div">{{ $post->body_html }}</div>
				    <script type="text/javascript">
						var htmleditor = ace.edit("editor-html");
					    setEditorOptions(htmleditor,'html');
				    </script>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="profile">
			    	<div id="editor-css" class="html-div">{{ $post->body_css }}</div>
				    <script type="text/javascript">
						var htmleditor = ace.edit("editor-css");
					    setEditorOptions(htmleditor,'css');
				    </script>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="messages">
			    	<div id="editor-js" class="html-div">{{ $post->body_js }}</div>
				    <script type="text/javascript">
						var htmleditor = ace.edit("editor-js");
					    setEditorOptions(htmleditor,'javascript');
				    </script>
			    </div>
			  </div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 letest-post post">
		<h2 class="letest-post-title">Related Post</h2>
	</div>
</div>
<div class="row latest-post-main">
	@if($latestpost->count())
		@foreach($latestpost as $post)
    		@include('front.post-box-design')
		@endforeach
	@endif
</div>
@endsection