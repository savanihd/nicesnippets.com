@extends($adminTheme)

@section('title')
Create Post
@endsection

@section('content')
<section class="content-header">
	<div class="row">
		<div class="col-md-6">
  			<h2>Create Post</h2>
		</div>
		<div class="col-md-6 text-right content-header-btn">
			<a href="{{ route('posts.index') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Back</a>
		</div>
	</div>
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Create New Post</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
        {!! Form::open(array('route' => 'posts.store','method'=>'POST','autocomplete'=>'off')) !!}
		  <div class="box-body">
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Title</label>
                      {!! Form::text('title', old('title'), array('placeholder' => 'Enter Title','class' => 'form-control')) !!}
                      @if($errors->has('title'))
                        <div><span class="error">{{ $errors->first('title')}}</span></div>
                      @endif
				    </div>		
		  		</div>
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Seo Title</label>
				      {!! Form::text('seo_title', old('seo_title'), array('placeholder' => 'Enter Seo Title','class' => 'form-control')) !!}
				      @if($errors->has('seo_title'))
                        <div><span class="error">{{ $errors->first('seo_title')}}</span></div>
                      @endif
				    </div>
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Content</label>
                      {!! Form::textarea('body', old('body'), array('placeholder' => 'Enter Content','class' => 'form-control','rows'=>'3')) !!}
                      @if($errors->has('body'))
                        <div><span class="error">{{ $errors->first('body')}}</span></div>
                      @endif
				    </div>		
		  		</div>
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Slug</label>
				      {!! Form::text('slug', old('slug'), array('placeholder' => 'Enter Slug','class' => 'form-control')) !!}
				      @if($errors->has('slug'))
                        <div><span class="error">{{ $errors->first('slug')}}</span></div>
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
				      <label>Meta Keywords</label>
				      {!! Form::textarea('meta_keywords', old('meta_keywords'), array('placeholder' => 'Enter Meta Keywords','class' => 'form-control','rows'=>'3')) !!}
				      @if($errors->has('meta_keywords'))
                        <div><span class="error">{{ $errors->first('meta_keywords')}}</span></div>
                      @endif
				    </div>
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Body Html</label>
                      {!! Form::textarea('body_html', old('body_html'), array('placeholder' => 'Enter Body Html','class' => 'form-control','rows'=> 3)) !!}
                      @if($errors->has('body_html'))
                        <div><span class="error">{{ $errors->first('body_html')}}</span></div>
                      @endif
				    </div>		
		  		</div>
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Body Css</label>
				      {!! Form::textarea('body_css', old('body_css'), array('placeholder' => 'Enter Body Css','class' => 'form-control','rows'=> 3)) !!}
				      @if($errors->has('body_css'))
                        <div><span class="error">{{ $errors->first('body_css')}}</span></div>
                      @endif
				    </div>
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Body Js</label>
                      {!! Form::textarea('body_js', old('body_js'), array('placeholder' => 'Enter Body js','class' => 'form-control','rows'=> 3)) !!}
                      @if($errors->has('body_js'))
                        <div><span class="error">{{ $errors->first('body_js')}}</span></div>
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