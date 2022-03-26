@extends($adminTheme)

@section('title')
 Dashboard
@endsection

@section('content')
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-lg-3 col-xs-6">
		  <!-- small box -->
		  <div class="small-box bg-aqua">
		    <div class="inner">
		      <h3>{{ $userCount }}</h3>

		      <p>User</p>
		    </div>
		    <div class="icon">
		      <i class="fa fa-user"></i>
		    </div>
		    <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		  </div>
		</div>
		<div class="col-lg-3 col-xs-6">
		  <!-- small box -->
		  <div class="small-box bg-red">
		    <div class="inner">
		      <h3>{{ $blogCount }}</h3>

		      <p>Blog</p>
		    </div>
		    <div class="icon">
		     	<i class="fa fa-pencil"></i>
		    </div>
		    <a href="{{ route('blogs.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		  </div>
		</div>
		<div class="col-lg-3 col-xs-6">
		  <!-- small box -->
		  <div class="small-box bg-yellow">
		    <div class="inner">
		      <h3>{{ $blogCategoryCount }}</h3>

		      <p>Blog Category</p>
		    </div>
		    <div class="icon">
		      <i class="fa fa-bullseye" ></i>
		    </div>
		    <a href="{{ route('category-blog.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		  </div>
		</div>
		<div class="col-lg-3 col-xs-6">
		  <!-- small box -->
		  <div class="small-box bg-green">
		    <div class="inner">
		      <h3>{{ $postCount }}</h3>

		      <p>Post</p>
		    </div>
		    <div class="icon">
		      <i class="fa fa-th"></i>
		    </div>
		    <a href="{{ route('posts.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		  </div>
		</div>
		{{-- <div class="col-md-12">
			<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Most Popular Blog</h3>
              <div class="box-tools" style="right: 70px;">
              	<form action="{{ URL::route('admin.home') }}" method="get">
              		{{ Form::select('searchBlogDay', ['1'=>'Today','2'=>'Yesterday','7'=>'7 Days','30'=>'30 Days','182'=>'6 Month','365'=>'1 Year','all'=>'All Time'], Request::get('searchBlogDay'), ['class'=>'form-control']) }}
              	</form>
              </div>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>View</th>
                    <th>Create Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  	@if(!empty($blogpopular) && count($blogpopular) > 0)
					    @foreach($blogpopular as $key => $value)
					    <tr>
					        <td class="id-width">{{ ++$i }}</td>
					        <td>{{ $value->title }}</td>
					        <td>
					         <label class="label label-success" >{{ $value->total_view }}</label>
					        </td>
					        <td>{{  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d-m-Y') }}</td>
					        <td>
					            <a href="{{ route('blog.detail',$value->slug) }}" class="btn btn-info btn-xs btn-flat" data-toggle="tooltip" title="View" target="_black"><i class="fa fa-eye"></i> View</a>
					        </td>
					    </tr>
					    @endforeach
					@else
					    <td class="text-center" colspan="6">There Are No Blog.</td>
					@endif
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
          </div>
		</div> --}}
		<div class="col-md-7">
			<div class="box box-info">
	            <div class="box-header with-border">
	              <h3 class="box-title">Month In Total Blog</h3>
	              <div class="box-tools" style="right: 70px;">
	              	<form action="{{ URL::route('admin.home') }}" method="get">
	              	{{ Form::select('currentYearChart', ['2021'=>'Year 2021','2020'=>'Year 2020','2019'=>'Year 2019'], is_null(Request::get('searchBlogDay')) ? date('Y'):Request::get('searchBlogDay')   , ['class'=>'form-control']) }}
	              	</form>
		          </div>
		           <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	                </button>
	                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	              </div>
	          	</div>
	          	<div class="box-body">
	          		 <div id="columnchart_values" style="width: 100%; height: 400px;"></div>
	          	</div>
          </div>
        </div>
        {{-- <div class="col-md-5" style="padding-left: 0px">
			<div class="box box-info">
	            <div class="box-header with-border">
	              <h3 class="box-title">Total Language In Blog</h3>
	              <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	                </button>
	                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	              </div>
	          	</div>
	          	<div class="box-body">
	          		 <div id="pieChart" style="width: 100%; height: 400px;"></div>
	          	</div>
          </div>
        </div> --}}
	</div>
</section>
@endsection

@section('script')
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script>
 	$("select[name='searchBlogDay']").change(function(){
   	 	$(this).parents('form').submit();
  	});

  	$("select[name='currentYearChart']").change(function(){
   	 	$(this).parents('form').submit();
  	});

 	 var visitor = <?php echo $visitor; ?>;
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(visitor);
        var options = {
          curveType: 'function',
          legend: { position: 'right', },
          colors: ['green'],
          title: 'Total Month In Blog',
          bar: {groupWidth: '30%'},
          hAxis: {title: 'Month'},
          vAxis: {title: 'Blog'},
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_values'));
        chart.draw(data, options);
      }


 </script>
 {{-- <script>
 	var blogcategorychart = <?php echo $blogcategorychart; ?>;
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      console.log(blogcategorychart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(blogcategorychart);
        var options = {
          curveType: 'function',
          is3D: true,
          legend: { position: 'bottom' },
          title: 'Total Language In Blog',
        };
        var chart = new google.visualization.PieChart(document.getElementById('pieChart'));
        chart.draw(data, options);
      }
 </script> --}}
@endsection