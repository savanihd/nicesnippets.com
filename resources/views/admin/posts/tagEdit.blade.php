@extends($adminTheme)

@section('title')
Add Tag
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
<style type="text/css">
	.taglist span{
		background-color:#C5EEFA;
		display: inline-block;
		border-radius: 5px;
		padding: 2px 10px;
		margin-left: 2px;
		color:#31B0D5;
		margin-bottom: 3px;
	}
</style>
@endsection

@section('content')
<section class="content-header">
	<div class="row">
		<div class="col-md-6">
  			<h2>Add Tag</h2>
		</div>
		<div class="col-md-6 text-right content-header-btn">
			<a href="{{ route('posts.index') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Back</a>
		</div>
	</div>
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Add Tag</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
        {!! Form::open(array('route' => 'post.tag.store','method'=>'POST','autocomplete'=>'off')) !!}
		  <div class="box-body">
		  	<div class="row">
		  		<div class="col-md-6">
		  			<input type="hidden" name="postId" value="{{ $id }}">
		  			<div class="form-group">
				      	<label>Tag</label>
                      	<input type="text" name="tag"  autocomplete="off" placeholder="Tag" class="typeahead  tm-input form-control tm-input-info"/>
                      	@if($errors->has('tag'))
                        	<div><span class="error">{{ $errors->first('tag')}}</span></div>
                      	@endif
						<div class="taglist">
							@foreach($tagList as $key => $value)
								<span>{{ $value->tagName }}</span>
							@endforeach
						</div>		
				    </div>		
		  		</div>
		  	</div>
		  </div>
		  <!-- /.box-body -->

		  <div class="box-footer">
		    <button type="submit" class="btn btn-primary btn-flat">Submit</button>
		  </div>
        {!! Form::close() !!}
	</div>
</section>
@endsection
@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
<script type="text/javascript">
$(".chosen").chosen();
	$(document).ready(function() {
	    var tagApi = $(".tm-input").tagsManager();

	    jQuery(".typeahead").typeahead({
	      	name: 'tags',
	      	displayKey: 'name',
	      	source: function (query, process) {
	        	return $.get('/admin/get-tags-list/ajax', { query: query }, function (data) {
	          		data = $.parseJSON(data);
	          		return process(data);
	        	});
	      	},

	    	afterSelect :function (item){
	    		tagApi.tagsManager("pushTag", item);
	    	}

	    });
	});
</script>
@endsection