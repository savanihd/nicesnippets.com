@extends($adminTheme)

@section('title')
 Related Blogs
@endsection

@section('style')
<style type="text/css">
	.select-class{
		height: 200px;
		width: 200px;
	}
</style>
@endsection
@section('content')
<section class="content-header">
	<div class="row">
		<div class="col-md-6">
  			<h2>Related Blogs</h2>
		</div>
		<div class="col-md-6 text-right content-header-btn">
			<a href="{{ route('blogs.index') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Back</a>
		</div>
	</div>
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Related Blogs</h3>
		</div>
		<div class="box-body">
		  	<div class="row">
		  		<div class="col-md-12">
		  			<div class="form-group">
					    {!! Form::open(array('route' => 'admin.related.blog.store','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!}
					    	<select data-placeholder="Choose tags ..." name="tags[]" multiple class="chosen-select">
					    		@foreach($blog as $key => $value)
					    			@if(!empty($taglist) && in_array($key, $taglist))
							    	<option selected="true" value="{{ $key }}">{{ $value }}</option>
							    	@else
							    	<option  value="{{ $key }}">{{ $value }}</option>
							    	@endif
							    @endforeach
							</select>
							<div class="box-footer">
						    	<button type="submit" class="btn btn-primary btn-flat">Submit</button>
						  	</div>
						  	<input type="hidden" name="blog_id" value="{{ $id }}">
					    {!! Form::close() !!}
		  			</div>
	  			</div>
  			</div>
		</div>
	</div>
</section>
@endsection
@section('script')
   	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css" integrity="sha256-0LjJurLJoa1jcHaRwMDnX2EQ8VpgpUMFT/4i+TEtLyc=" crossorigin="anonymous" />
   	<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" integrity="sha256-c4gVE6fn+JRKMRvqjoDp+tlG4laudNYrXI1GncbfAYY=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			 $(".chosen-select").chosen({width: "50%"}); 
		});
	</script>
@endsection
