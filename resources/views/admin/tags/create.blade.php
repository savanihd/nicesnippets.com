<!DOCTYPE html>
<html>
<head>
	<meta name="_token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
    
</head>
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
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">

			{!! Form::open(array('route' =>'admin.tags.store','method'=>'POST','files'=>'true')) !!}
				
				    <div class="form-group">
				      	<label>Post:</label>
				        {!! Form::select('selectName',$getpost, null,['class'=>'chosen form-control p']) !!}
				    </div>

				    <div class="form-group">
				    	<label>Tags:</label>
				    	<input type="text" name="tags"  autocomplete="off" placeholder="Tags" class="typeahead  tm-input form-control tm-input-info"/>
					<div class="taglist"></div>
					</div>

				  	<div class="form-group">
				    	<label>Image:</label>
					    {!! Form::file('image',['class'=>'form-control']) !!}
					</div>

					<div class="form-group">
				    	<label>Upload Snippet Zip : </label>
					    {!! Form::file('uploadzip',['class'=>'form-control']) !!}
					    <span class="is-snippet-zip"></span>
					</div>

					<div class="form-group">
						<label>is_demo Check : </label><br>
						{{ Form::checkbox('is_demo',1,null,['class'=>'is-demo-checkbox']) }}
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-info">submit</button>
					</div>
					
				 
			{!! Form::close() !!}

		</div>
	</div>
</div>

<script>
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
            url: '/getAjaxPost/'+post_id,
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

</body>
</html>


