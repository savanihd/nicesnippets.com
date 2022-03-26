@extends('layouts.default')

@section('content')

<h1><i class="fa fa-tags" aria-hidden="true"></i> Tags:</h1>

<hr>

<div class="row">
	<div class="col-md-12 tag-section">
		@foreach($taglist as $key=>$value)
			<div class="taglist">
				<p><i class="fa fa-circle" aria-hidden="true"></i> <a href="{{ route('tag.pages',$value->slug) }}">{{ $value->tag }} </a></p>
			</div>
		@endforeach
	</div>
</div>

@endsection