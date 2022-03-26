@extends($adminTheme)

@section('title')
 Image
@endsection

@section('content')
<section class="content-header">
	<div class="row">
		<div class="col-md-6">
  			<h2>Image</h2>
		</div>
	</div>
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Image</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
        {!! Form::open(array('route' =>'images.store','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!}
		  <div class="box-body">
		  	<div class="row">
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
		  </div>
		  <!-- /.box-body -->

		  <div class="box-footer">
		    <button type="submit" class="btn btn-primary btn-flat">Submit</button>
		  </div>
        {!! Form::close() !!}
	</div>
</section>
@endsection