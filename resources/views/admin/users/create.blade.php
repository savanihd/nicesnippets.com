@extends($adminTheme)

@section('title')
Create User
@endsection

@section('content')
<section class="content-header">
	<div class="row">
		<div class="col-md-6">
  			<h2>Create User</h2>
		</div>
		<div class="col-md-6 text-right content-header-btn">
			<a href="{{ route('users.index') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Back</a>
		</div>
	</div>
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Create New User</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
        {!! Form::open(array('route' => 'users.store','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!}
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
				      <label>Email</label>
                      {!! Form::text('email', old('email'), array('placeholder' => 'Enter Email','class' => 'form-control')) !!}
                      @if($errors->has('email'))
                        <div><span class="error">{{ $errors->first('email')}}</span></div>
                      @endif
				    </div>		
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Password</label>
                      {!! Form::password('password', array('placeholder' => 'Enter Password','class'=>'form-control','AutoComplete'=>'off')) !!}
                      @if($errors->has('password'))
                        <div><span class="error">{{ $errors->first('password')}}</span></div>
                      @endif
				    </div>		
		  		</div>
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Confirm Password</label>
                      {!! Form::password('password_confirmation', array('placeholder' => 'Enter Confirm Password','class'=>'form-control edit-password-c')) !!}
                      @if($errors->has('password_confirmation'))
                        <div><span class="error">{{ $errors->first('password_confirmation')}}</span></div>
                      @endif
				    </div>		
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Image</label>
                      {!! Form::file('avatar', array('class' => 'form-control')) !!}
                      @if($errors->has('avatar'))
                        <div><span class="error">{{ $errors->first('avatar')}}</span></div>
                      @endif
				    </div>		
		  		</div>
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Is_admin</label><br>
                        {!! Form::radio('is_admin', '1',true) !!} <span class="mb-2">Admin</span>
                        {!! Form::radio('is_admin', '0') !!} Normal User
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