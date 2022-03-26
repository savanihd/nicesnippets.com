@extends($adminTheme)

@section('title')
Edit Tag
@endsection

@section('content')
<section class="content-header">
	<div class="row">
		<div class="col-md-6">
  			<h2>Edit Tag</h2>
		</div>
		<div class="col-md-6 text-right content-header-btn">
			<a href="{{ route('tags-crud.index') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Back</a>
		</div>
	</div>
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Edit Tag</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
        {!! Form::model($tag, ['method' => 'PATCH','route' => ["tags-crud.update", $tag->id],'files'=>true]) !!}
		  <div class="box-body">
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Tag</label>
                      {!! Form::text('tag', old('tag'), array('placeholder' => 'Enter Tag','class' => 'form-control')) !!}
                      @if($errors->has('tag'))
                        <div><span class="error">{{ $errors->first('tag')}}</span></div>
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
		  </div>
		  <!-- /.box-body -->

		  <div class="box-footer">
		    <button type="submit" class="btn btn-primary btn-flat">Submit</button>
		  </div>
        {!! Form::close() !!}
	</div>
</section>
@endsection