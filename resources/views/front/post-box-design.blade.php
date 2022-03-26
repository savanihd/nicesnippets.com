<div class="blog-post-item col-md-4 col-sm-4">
    <a a href="{{ route('post.detail',$post->slug) }}" title="{{ $post->title }}">
        @if(!empty($post->path))
            <figure class="margin-bottom-20">
                <img class="img-responsive" src="{{ getPostImagePath($post->path) }}" alt="{{ $post->title }}">
            </figure>
        @else
            <figure class="margin-bottom-20">
                <img class="img-responsive" src="{{ asset('/image/img_default.png') }}" alt="{{ $post->title }}">
            </figure>
        @endif
    </a>    
    <h2><a href="{{ route('post.detail',$post->slug) }}" title="{{ $post->title }}">{{ str_limit($post->title,60) }}</a></h2>
    <ul class="blog-post-info list-inline">
        <li>
            <a href="#">
                <i class="fa fa-user"></i> 
                <span class="font-lato">NiceSnippets</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-eye"></i> 
                <span class="font-lato">{{ $post->total_view }}</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-clock-o"></i> 
                <span class="font-lato">{{ date('M d, Y', strtotime($post->created_at)) }}</span>
            </a>
        </li>
    </ul>
    <p>{{ str_limit($post->body,80) }}</p>
    <a href="{{ route('post.detail',$post->slug) }}" class="btn btn-reveal btn-default pull-right">
        <i class="fa fa-plus"></i>
        <span>Read More</span>
    </a>
</div>