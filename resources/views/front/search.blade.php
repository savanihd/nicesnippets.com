@extends($frontTheme)

@section('title')
    <h1>Search : {{ $search }}</h1>
@stop

@section('content')
<style type="text/css">
    section{
        padding-top: 40px !important;
    }
    .page-header{
        padding-top: 20px !important;
    }
</style>



<div class="callout home-desc alert alert-border blog-post-item">
    <div class="row">
        <div class="col-md-12 col-sm-12 home-desc-detail">
            <p>NiceSnippets.com provides good layouts design of snippets like profile, grid, pagination, chat, forms, buttons, model, slider, search, social, badges, controls, footer, select, calender, timeline etc. You can simple take html, css and js code and get layout of available snippets. We provide bootstrap design widget and we also provide without bootstrap snippets.</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 content-add1-search" align="center">
        {!! $settingsFrontData['content-add1'] !!}
    </div>
</div><br>

<div class="row">
    @if($posts->count())
        @foreach($posts as $post)
            @include('front.post-box-design')
        @endforeach
    @endif
</div>
<!-- /.row -->

<div class="row">
    <div class="col-md-12 add-tag-section-bottom" align="center">
        {!! $settingsFrontData['content-add2'] !!}
    </div>
</div>

<!-- Pagination -->
<div class="row text-center">
    <div class="col-lg-12">
        @if(!empty($posts) && $posts->count())
            {!! $posts->appends(Input::all())->render() !!}
        @endif
    </div>
</div>
<!-- /.row -->
@endsection