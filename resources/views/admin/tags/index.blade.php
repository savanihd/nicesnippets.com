@extends($adminTheme)

@section('title')
Manage Tag
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
	}
</style>
@endsection

@section('content')
<section class="content-header">
	<div class="row">
		<div class="col-md-6">
  			<h2>Manage Tag</h2>
		</div>
	</div>
</section>
<section class="content">
  <div class="box box-primary">
  	<div class="box-header with-border">
	  <h3 class="box-title">Create New Tag</h3>
	</div>
	{!! Form::open(array('route' =>'tags.store','method'=>'POST','files'=>'true')) !!}
  	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
			    <div class="form-group">
			      	<label>Post:</label>
			        {!! Form::select('selectName',$getpost, null,['class'=>'chosen form-control p']) !!}
			    </div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
			    	<label>Tags:</label>
			    	<input type="text" name="tags"  autocomplete="off" placeholder="Tags" class="typeahead  tm-input form-control tm-input-info"/>
					<div class="taglist"></div>		
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
			  	<div class="form-group">
			    	<label>Image:</label>
				    {!! Form::file('image',['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
			    	<label>Upload Snippet Zip : </label>
				    {!! Form::file('uploadzip',['class'=>'form-control']) !!}
				    <span class="is-snippet-zip"></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>is_demo Check : </label><br>
					{{ Form::checkbox('is_demo',1,null,['class'=>'is-demo-checkbox']) }}
				</div>
			</div>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-info">submit</button>
		</div>
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

<script type="text/javascript">
    $("body").on("change",".p",function(){
	    var token = $('meta[name="_token"]').attr('content');
	    var post_id = $('.p').val();
	    $.ajax({ 
	        url: 'admin/getAjaxPost/'+post_id,
	        method: 'POST',
	        data: {_token:token, post_id:post_id},
	        success: function(data) {
	            console.log(data);
	            if(data.error == 'ture'){
	                alert('Somethings Want To Wrong.');
	            }else{
	            	$(".taglist").html(data.tagData);	

	            	if(data.postData.is_download == '1'){
	            		$('.is-snippet-zip').html('Zip Uploaded');
	            	}else{
	            		$('.is-snippet-zip').html('Zip Not Uploaded');
	            	}

	            	if(data.postData.is_demo == '1'){
	            		$('.is-demo-checkbox').attr('checked', true);
	            	}else{
	            		$('.is-demo-checkbox').attr('checked', false);
	            	}
	            }
	            
	        }
	    });
    });
</script>
@endsection