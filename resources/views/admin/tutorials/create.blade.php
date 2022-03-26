@extends($adminTheme)

@section('title')
Create Tutorial
@endsection

@section('content')
<section class="content-header">
	<div class="row">
		<div class="col-md-6">
  			<h2>Create Tutorial</h2>
		</div>
		<div class="col-md-6 text-right content-header-btn">
			<a href="{{ route('tutorials.index') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Back</a>
		</div>
	</div>
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Create New Tutorial</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
        {!! Form::open(array('route' => 'tutorials.store','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!}
		  <div class="box-body">
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Language</label>
                      {!! Form::select('language_id', [''=>'Select Language']+$languageList, null, array('class' => 'form-control')) !!}
                      @if($errors->has('language_id'))
                        <div><span class="error">{{ $errors->first('language_id')}}</span></div>
                      @endif
				    </div>		
		  		</div>
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Topic Name</label>
                      {!! Form::text('topic_name', old('topic_name'), array('placeholder' => 'Enter Topic Name','class' => 'form-control')) !!}
                      @if($errors->has('topic_name'))
                        <div><span class="error">{{ $errors->first('topic_name')}}</span></div>
                      @endif
				    </div>		
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Description</label>
                      {!! Form::textarea('description', old('description'), array('placeholder' => 'Enter Description','class' => 'form-control','rows'=>'3')) !!}
                      @if($errors->has('description'))
                        <div><span class="error">{{ $errors->first('description')}}</span></div>
                      @endif
				    </div>		
		  		</div>
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Example Demo</label>
                      {!! Form::textarea('example_demo', old('example_demo'), array('placeholder' => 'Enter Example Demo','class' => 'form-control','rows'=>'3')) !!}
                      @if($errors->has('example_demo'))
                        <div><span class="error">{{ $errors->first('example_demo')}}</span></div>
                      @endif
				    </div>		
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Html Code</label>
                      {!! Form::textarea('html_code', old('html_code'), array('placeholder' => 'Enter Html Code','class' => 'form-control','rows'=>'3')) !!}
                      @if($errors->has('html_code'))
                        <div><span class="error">{{ $errors->first('html_code')}}</span></div>
                      @endif
				    </div>		
		  		</div>
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Css Code</label>
                      {!! Form::textarea('css_code', old('css_code'), array('placeholder' => 'Enter Css Demo','class' => 'form-control','rows'=>'3')) !!}
                      @if($errors->has('css_code'))
                        <div><span class="error">{{ $errors->first('css_code')}}</span></div>
                      @endif
				    </div>		
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Js Code</label>
                      {!! Form::textarea('js_code', old('js_code'), array('placeholder' => 'Enter Js Code','class' => 'form-control','rows'=>'3')) !!}
                      @if($errors->has('js_code'))
                        <div><span class="error">{{ $errors->first('js_code')}}</span></div>
                      @endif
				    </div>		
		  		</div>
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Sort</label>
                      {!! Form::text('sort', old('sort'), array('placeholder' => 'Enter Sort','class' => 'form-control')) !!}
                      @if($errors->has('sort'))
                        <div><span class="error">{{ $errors->first('sort')}}</span></div>
                      @endif
				    </div>		
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Meta Title</label>
                      {!! Form::text('meta_title', old('meta_title'), array('placeholder' => 'Enter Meta Title','class' => 'form-control')) !!}
                      @if($errors->has('meta_title'))
                        <div><span class="error">{{ $errors->first('meta_title')}}</span></div>
                      @endif
				    </div>		
		  		</div>
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Meta Description</label>
                      {!! Form::textarea('meta_description', old('meta_description'), array('placeholder' => 'Enter Meta Description','class' => 'form-control','rows'=>'3')) !!}
                      @if($errors->has('meta_description'))
                        <div><span class="error">{{ $errors->first('meta_description')}}</span></div>
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