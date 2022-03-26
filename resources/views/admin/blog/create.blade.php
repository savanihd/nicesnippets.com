@extends($adminTheme)

@section('title')
 Create Blog
@endsection
@section('style')
<style type="text/css">
	.display-none{
		display: none;
	}
	.display-block{
		display: block;
	}
</style>
@endsection

@section('content')
<section class="content-header">
	<div class="row">
		<div class="col-md-6">
  			<h2>Create Blog</h2>
		</div>
		<div class="col-md-6 text-right content-header-btn">
			<a href="{{ route('blogs.index') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Back</a>
		</div>
	</div>
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Create New Blog</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
        {!! Form::open(array('route' => 'blogs.store','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!}
		  <div class="box-body">
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Blog Category</label>
                      {!! Form::select('blog_category_id[]',$blogCategoryList, old('blog_category_id'), array('class' => 'form-control','multiple'=>'multiple')) !!}
                      @if($errors->has('blog_category_id'))
                        <div><span class="error">{{ $errors->first('blog_category_id')}}</span></div>
                      @endif
				    </div>		
		  		</div>
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Title</label>
                      {!! Form::text('title', old('title'), array('placeholder' => 'Enter Title','class' => 'form-control')) !!}
                      @if($errors->has('title'))
                        <div><span class="error">{{ $errors->first('title')}}</span></div>
                      @endif
				    </div>		
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-12">
		  			<div class="form-group">
				      <label>Body</label>
                      {!! Form::textarea('body', old('body'), array('placeholder' => 'Enter Body','class' => 'form-control','rows'=>'10')) !!}
                      @if($errors->has('body'))
                        <div><span class="error">{{ $errors->first('body')}}</span></div>
                      @endif
				    </div>		
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Meta Description</label>
                      {!! Form::textarea('meta_description', old('meta_description'), array('placeholder' => 'Enter Meta Description','class' => 'form-control','rows'=>'3')) !!}
                      @if($errors->has('meta_description'))
                        <div><span class="error">{{ $errors->first('meta_description')}}</span></div>
                      @endif
				    </div>		
		  		</div>
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Image</label>
                      <input type="file" name="image" class="form-control">
                      @if($errors->has('image'))
                        <div><span class="error">{{ $errors->first('image')}}</span></div>
                      @endif
				    </div>		
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Publish :</label><br>
                       <div class="onoffswitch">
					        <input type="checkbox" name="is_publish" class="onoffswitch-checkbox is-publish" id="myonoffswitch"  @if(old('is_publish') == 'on') checked @elseif($errors->has('publish_date')) '' @else checked @endif>
					        <label class="onoffswitch-label" for="myonoffswitch">
					            <span class="onoffswitch-inner"></span>
					            <span class="onoffswitch-switch"></span>
					        </label>
					    </div>
				    </div>		
		  		</div>
		  		<div class="col-md-6 {{ old('publish_date') || $errors->has('publish_date') ? 'display-block' : 'display-none' }} publish-date">
		  			<div class="form-group">
				      	<label>Publish Date :</label>
						{!! Form::text('publish_date', old('publish_date'), array('placeholder' => 'Enter Publish Date','class' => 'form-control publish-date-input', 'id' => 'datepicker')) !!}
                      	@if($errors->has('publish_date'))
                        	<div><span class="error">{{ $errors->first('publish_date')}}</span></div>
                      	@endif
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
<script type="text/javascript">
	$('.is-publish').change(function(event) {
		var is_publish = $(this).prop('checked');
		if (is_publish == false) {
			$('.publish-date').removeClass('display-none');
			$('.publish-date').addClass('display-block');
		}else{
			$('.publish-date').removeClass('display-block');
			$('.publish-date').addClass('display-none');
			$('.publish-date-input').val('');
		}
	});
	//Date picker
    $('#datepicker').datepicker({
      	autoclose: true
    })
</script>
@endsection