@extends($adminTheme)

@section('title')
Front Settings
@endsection

@section('content')
<section class="content-header">
	<div class="row">
		<div class="col-md-6">
  			<h2>Manage Front Settings</h2>
		</div>
	</div>
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Manage Front Settings</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		{!! Form::open(array('route' => 'front.settings.update','autocomplete'=>'off','files'=>'true')) !!}
		  <div class="box-body">
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Head Tag</label>
                      {!! Form::textarea($frontSettings['head-tag']['type'], $frontSettings['head-tag']['value'], array('class' => 'form-control' ,'size' => '30x5')) !!}
				    </div>		
		  		</div>
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Detail Page Header</label>
				      {!! Form::textarea($frontSettings['detail-page-header']['type'], $frontSettings['detail-page-header']['value'], array('class' => 'form-control' ,'size' => '30x5')) !!}
				    </div>
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Menu Bar</label>
                      {!! Form::textarea($frontSettings['menu-bar']['type'], $frontSettings['menu-bar']['value'], array('class' => 'form-control' ,'size' => '30x5')) !!}
				    </div>		
		  		</div>
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Content Add1</label>
				      {!! Form::textarea($frontSettings['content-add1']['type'], $frontSettings['content-add1']['value'], array('class' => 'form-control' ,'size' => '30x5')) !!}
				    </div>
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Content Add2</label>
                      {!! Form::textarea($frontSettings['content-add2']['type'], $frontSettings['content-add2']['value'], array('class' => 'form-control' ,'size' => '30x5')) !!}
				    </div>		
		  		</div>
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Sidebar Add</label>
				      {!! Form::textarea($frontSettings['sidebar-add']['type'], $frontSettings['sidebar-add']['value'], array('class' => 'form-control' ,'size' => '30x5')) !!}
				    </div>
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Demo Left Add</label>
                      {!! Form::textarea($frontSettings['demo-left-add']['type'], $frontSettings['demo-left-add']['value'], array('class' => 'form-control' ,'size' => '30x5')) !!}
				    </div>		
		  		</div>
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Demo Right Add</label>
				      {!! Form::textarea($frontSettings['demo-right-add']['type'], $frontSettings['demo-right-add']['value'], array('class' => 'form-control' ,'size' => '30x5')) !!}
				    </div>
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Demo Top Left Add</label>
                      {!! Form::textarea($frontSettings['demo-top-left-add']['type'], $frontSettings['demo-top-left-add']['value'], array('class' => 'form-control' ,'size' => '30x5')) !!}
				    </div>		
		  		</div>
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Demo Top Right Add</label>
				      {!! Form::textarea($frontSettings['demo-top-right-add']['type'], $frontSettings['demo-top-right-add']['value'], array('class' => 'form-control' ,'size' => '30x5')) !!}
				    </div>
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Detail Add</label>
                      {!! Form::textarea($frontSettings['detail-add']['type'], $frontSettings['detail-add']['value'], array('class' => 'form-control' ,'size' => '30x5')) !!}
				    </div>		
		  		</div>
		  		<div class="col-md-6">
		  			<div class="form-group">
				      <label>Free Tutorials Add</label>
                      {!! Form::textarea($frontSettings['free-tutorials-add']['type'], $frontSettings['free-tutorials-add']['value'], array('class' => 'form-control' ,'size' => '30x5')) !!}
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