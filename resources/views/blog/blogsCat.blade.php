@extends('newBlogTheme.default')

@section('content')
<div class="col-md-12 p-0">
  <div class="blog-cat-name">
    <h3>{{ $blogsCatName }}</h3>
  </div>
</div>
@if($blogsCatDetail->count())
  @foreach($blogsCatDetail as $key => $value)
    <div class="row content">
          <div class="col-md-12">
              <h2 class="m-0 p-0"><a href="{{ route('blog.detail',$value->slug) }}" class="color-a">{{ $value->title }}</a></h2>
          </div>
          <div class="col-md-12 hed-sub-text">
              <p><span><i class="fa fa-user"></i></span>Nicesnippets</p>
              {{--<p><span><i class="fa fa-eye"></i></span>{{ $value->total_view }}</p>--}}
              <p><span><i class="fa fa-clock-o"></i></span>{{ $value->created_at->format('d-m-Y') }}</p>
              <hr>
          </div>
          <div class="col-md-12 hed-sub-des">
            <p>{{ strip_tags(Str::limit($value->body,265)) }}</p>
          </div>
        </div>
  @endforeach
@endif
{{ $blogsCatDetail->links('vendor.pagination.bootstrap-4') }}
@endsection
