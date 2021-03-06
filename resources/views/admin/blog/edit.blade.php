@extends($adminTheme)

@section('title')
 Edit Blog
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
  			<h2>Edit Blog</h2>
		</div>
		<div class="col-md-6 text-right content-header-btn">
			<a href="{{ route('blogs.index') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Back</a>
		</div>
	</div>
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Edit Blog</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
        {!! Form::model($blog, ['method' => 'PATCH','route' => ["blogs.update", $blog->id],'files'=>true]) !!}
		  <div class="box-body">
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Blog Category</label>
                      <select name="blog_category_id[]" multiple="multiple" class="form-control">
                      	@foreach($blogCategoryList as $key => $value)
                      		<option value="{{ $key }}" {{ in_array ( $key, $blogCategoryConnect) ? 'selected' : '' }}>{{ $value }}</option>
                      	@endforeach
                      </select>
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
		  	<?php
                $body = str_replace('&lt;', '&amp;lt;', $blog->body);
                $blog->body = str_replace('&gt;', '&amp;gt;', $body);
            ?>
		  	<div class="row">
		  		<div class="col-md-12">
		  			<div class="form-group">
				      <label>Body</label>
                      {!! Form::textarea('body', old('body'), array('value' => '','placeholder' => 'Enter Body','class' => 'form-control','rows'=>'10')) !!}
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
					        <input type="checkbox" name="is_publish" class="onoffswitch-checkbox is-publish" id="myonoffswitch"  {{ $blog->is_publish == 1 || old('is_publish') ? 'checked' : '' }}>
					        <label class="onoffswitch-label" for="myonoffswitch">
					            <span class="onoffswitch-inner"></span>
					            <span class="onoffswitch-switch"></span>
					        </label>
					    </div>
				    </div>		
		  		</div>
		  		<div class="col-md-6 {{ !is_null($blog->publish_date) ? 'display-block' : 'display-none' }} publish-date">
		  			<div class="form-group">
				      	<label>Publish Date :</label>
						{!! Form::text('publish_date', old('publish_date'), array('placeholder' => 'Enter Publish Date','class' => 'form-control publish-date-input', 'id' => 'datepicker')) !!}
                      	@if($errors->has('publish_date'))
                        	<div><span class="error">{{ $errors->first('publish_date')}}</span></div>
                      	@endif
				    </div>		
		  		</div>
		  	</div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label>Is Small? :</label><br>
                       <div class="onoffswitch">
                            <input type="checkbox" name="is_small" class="onoffswitch-checkbox is-small" id="myonoffswitchClass"  {{ $blog->is_small == 1 || old('is_small') ? 'checked' : '' }}>
                            <label class="onoffswitch-label" for="myonoffswitchClass">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
                    </div>      
                </div>
            </div>
		  </div>
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