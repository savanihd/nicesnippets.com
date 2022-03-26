@extends($adminTheme)

@section('title')
Manage Blog Category
@endsection


@section('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.0/sweetalert2.min.css">
@endsection

@section('content')
<section class="content-header">
	<div class="row">
		<div class="col-md-6">
  			<h2>Manage Blog Category</h2>
		</div>
		<div class="col-md-6 text-right content-header-btn">
			<a href="{{ route('category-blog.create') }}" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Create New Blog Category</a>
		</div>
	</div>
</section>
<section class="content">
  <div class="box">
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tr>
          <th width="40px">ID</th>
          <th>Name</th>
          <th>Meta Description</th>
          <th width="80px">Post</th>
          <th width="180px">Action</th>
        </tr>
        <tbody>
          @include('admin.blogCategory.data')
        </tbody>
      </table>
    </div>
  </div>
  {{ $data->links() }}
</section>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.0/sweetalert2.all.min.js" type="text/javascript"></script>
<script type="text/javascript">
  $(".remove-crud").click(function(){
  var current_object = $(this);
    swal({
      title: "Are you sure delete this item?",
      text: "You will not be able to recover this imaginary file!",
      type: "error",
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: "No, cancel it!",
      width:'400px',
      padding: '50px',
    }).then(function(result){
      if (result.value) {
        var action = current_object.attr('data-action');
        var back = current_object.attr('data-back');
        var token = $("meta[name='_token']").attr("content");
        var id = current_object.attr('data-id');

        $('body').html("<form class='form-inline remove-form' method='POST' action='"+action+"'></form>");
        $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+ token +'">');
        if(back != ""){
          $('body').find('.remove-form').append('<input name="back_url" type="hidden" value="'+ back +'">');
        }
        $('body').find('.remove-form').append('<input name="_method" type="hidden" value="DELETE">');
        $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+ id +'">');
        $('body').find('.remove-form').submit();
      }
    });
  });
</script>
@endsection