@extends('newBlogTheme.default')

@section('meta_title')
	Category
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('newTheme/css/category.css') }}">
<style type="text/css">
	
</style>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12 title">
			<h1><i class="fa fa-hand-o-right" aria-hidden="true"></i> Category <i class="fa fa-hand-o-left" aria-hidden="true"></i> </h1>
		</div>
		<div class="col-md-12 cat-detail">
		<hr>
			<ul>
				@foreach($categories as $key => $value)
					<li><a href="{{ route('blog.cat',$value->slug) }}" target="_blank" style="font-size:16px;">{{ $value->name }}  </a> <span class="badge badge-danger">Post : {{ $value->category_connect_count }}</span></li>
				@endforeach
			</ul>
		</div>
	</div>
@endsection
