@extends($adminTheme)

@section('title')
 Create Blog Category
@endsection

@section('content')
<section class="content-header">
	<div class="row">
		<div class="col-md-6">
  			<h2>Create Blog Category</h2>
		</div>
		<div class="col-md-6 text-right content-header-btn">
			<a href="{{ route('category-blog.index') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Back</a>
		</div>
	</div>
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Create New Blog Category</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
        {!! Form::open(array('route' => 'category-blog.store','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!}
		  <div class="box-body">
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Name</label>
                      {!! Form::text('name', old('name'), array('placeholder' => 'Enter Name','class' => 'form-control')) !!}
                      @if($errors->has('name'))
                        <div><span class="error">{{ $errors->first('name')}}</span></div>
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
		  	<div class="row">
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