@extends('newBlogTheme.default')

@section('meta_title')
{{ $blog->title }}
@endsection

@section('style')
<style type="text/css">
    .content-box{
        background:#fff !important;
        box-shadow:0px 0px 6px #d2d2d2;
        border-bottom:5px solid #008B8B !important;
        border-radius:0px 15px;
        text-align: left !important;
    }
    .right-sidebar .content-box-new{
        text-align: left !important;   
    }
    .content-box .hed-sub-text{
        padding:5px 20px;
    }
    .random-posts-detail{
        letter-spacing:1px;
        padding:8px 0px 1px 0px;
        border-radius:0px 15px;
        /*margin:5px;*/
        width:97%;
        margin-left:12px;
        margin-top:13px !important;
    }
    .recommanded-post .hed-text h3{
        padding-top: 0px !important;
    }
    .recommended-posts-head ul{
        padding-left: 15px !important;
    }
</style>
@endsection

@section('content')
    <div class="col-md-12">
        <h1 class="p-0">{{ $blog->title }} pp</h1>
    </div>
    <div class="col-md-12 hed-sub-text">
        <p><span><i class="fa fa-th"></i></span>
        <?php $hasComma = false; ?>
        @foreach($blog->blogCategoryConnect as $categoryKey => $categoryValue)
          <span>
            @if($hasComma)
              ,
            @endif
            {{ $categoryValue->name }}
          </span>
          <?php  $hasComma=true; ?>
        @endforeach
        </p><p><span><i class="fa fa-user"></i></span>Nicesnippets</p>
        {{--<p><span><i class="fa fa-eye"></i></span>{{ $blog->total_view }}</p>--}}
        <p><span><i class="fa fa-clock-o"></i></span>{{ $blog->created_at->format('d-m-Y') }}</p>
        <hr>
    </div>

    {{-- <center>
        <div id="ezoic-pub-ad-placeholder-103">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Blog Detail top -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:728px;height:90px"
             data-ad-client="ca-pub-5716626356528112"
             data-ad-slot="1693386705"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        </div>
    </center> --}}

    <div class="col-md-12 hed-sub-des">

  		@if(!empty($blog->image))
  		<div style="padding: 10px;">
  			<center><img class="img-responsive" src="{{ asset('/upload/blog/'.$blog->image)}}" alt="{{ $blog->title }}" style="width:100%; height:auto;"></center>
  		</div>
  		@endif

        @php
  			$des = str_replace("\n", "</p><p>", "<p>".$blog->body."</p>");

			// $rr = '</strong><div class="row"><div class="col-md-6"><center><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><!-- Middle Box 1 --><ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5716626356528112" data-ad-slot="4377210275" data-ad-format="auto" data-full-width-responsive="true"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script></center></div><div class="col-md-6"><center><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><!-- Middle Box - 2 --><ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5716626356528112" data-ad-slot="6476211261" data-ad-format="auto" data-full-width-responsive="true"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script></center></div></div><br><div id = "v-nicesnippets"></div>';

			// $des = str_replace_description("</strong>", $rr, $des);

		@endphp

		{!! $des !!}
    </div>

    <hr>
    {{-- <div id="ezoic-pub-ad-placeholder-103">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Blog Bottom -->
    <ins class="adsbygoogle"
         style="display:inline-block;width:728px;height:90px"
         data-ad-client="ca-pub-5716626356528112"
         data-ad-slot="1361497600"></ins>
    <script>
         (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    </div> --}}

    {{-- @if(isset($settingsFrontData['detail-add']))
        <div class="col-md-12 col-xs-12 add2-post post-detail-add" align="center">
          {!! $settingsFrontData['detail-add'] !!}
        </div>
    @endif --}}

    @if(!empty($recommendedBlogs) && count($recommendedBlogs) > 0)
    <div class="col-md-12 p-0 recommanded-post content-box">
        <div class="col-md-12 hed-text text-center random-posts-detail" style="margin-bottom: 7px;">
            <h3 class="bottom-hed-text"><strong>Recommended Posts</strong></h3>
        </div>
        <div class="col-md-12 hed-sub-text recommended-posts-head">
          <ul>
            @foreach($allBlogs as $key => $value)
              @if(in_array($value->id,$recommendedBlogs))
                <li style="margin-bottom: 5px;"><a href="{{ route('blog.detail',$value->slug) }}" target="_blank">{{ $value->title }}</a></li>
              @endif
            @endforeach()
          </ul>
        </div>
    </div>
    @endif

    <div class="col-md-12 content-box-new p-0 content-box" style="margin-top: 30px;">
        <div class="col-md-12 heder-text-bottom random-posts-detail text-center">
            <h3 class="bottom-hed-text"><strong>Random Posts</strong></h3>
        </div>
        <div class="col-md-12 hed-sub-text">
          <ul class="p-0">
            @foreach($randomPosts as $key => $value)
              <li style="margin-bottom: 5px;"><a href="{{ route('blog.detail',$value->slug) }}" target="_blank"><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp; {{ $value->title }}</a></li>
            @endforeach()
          </ul>
        </div>
    </div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js?autoload=true&amp;skin=desert" defer></script>
@endsection