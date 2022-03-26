<div class="col-md-4 portfolio-item">
    <div class="thumbnail">
    	<div class="view">
    		<span><i class="fa fa-eye" aria-hidden="true"></i>{{ $post->total_view }}</span>
    	</div>
        <a a href="{{ route('post.detail',$post->slug) }}" title="{{ $post->title }}">
            @if(!empty($post->path))
				<img class="img-responsive" src="{{ getPostImagePath($post->path) }}" style="width:400px;height: 205px" alt="{{ $post->title }}">
			@else
            	<img class="img-responsive" src="http://placehold.it/700x400" alt="{{ $post->title }}">
			@endif
        </a>
        <div class="post-detail">
            <h3>
                <a href="{{ route('post.detail',$post->slug) }}" title="{{ $post->title }}">{{ Str::limit($post->title,45) }}</a>
            </h3>
            <p>{{ Str::limit($post->body,70) }}</p>
        </div>
        <!-- <div class="tag-list">
        	<i class="fa fa-tags"></i>
        	<?php
                $tagArray = explode(",",$post->tagList); 
                $tagSlugArray = explode(",",$post->tagSlugList);
            ?>

			@foreach($tagArray as $key=>$value)
				<?php
					if ($value == end($tagArray)) {
						$values = rtrim($value,',');
					}else{
    					$values = $value.',';
					}
				?>
			    <a href="{{ route('tag.pages',$tagSlugArray[$key]) }}">{{ $values }}</a> 
			@endforeach
        </div> -->
    </div>
</div>