@extends($frontTheme)

@section('title')
	<h1><i class="fa fa-tags" aria-hidden="true"></i> Tags:</h1>
@stop

@section('content')
<style type="text/css">
	section{
		padding-top: 40px !important;
	}
	.page-header{
		padding-top: 20px !important;
	}
</style>

<div class="row">
	<div class="col-md-6">
		<input type="text" class="form-control tag-search" placeholder="Search tags" /><br>
	</div>

	<div class="col-md-12 add-tag-section text-center">
		{!! $settingsFrontData['content-add1'] !!}
	</div>

	<div class="col-md-12 tag-section">
		@foreach($taglist as $key=>$value)
			<a href="{{ route('tag.pages',$value->slug) }}" class="tag">
					<span class="txt">{{ $value->tag }}</span><span class="num">{{ $value->totalPost }}</span>
			</a>
		@endforeach
	</div>
</div>

<div class="row">
	<div class="col-md-12 add-tag-section-bottom" align="center">
		{!! $settingsFrontData['content-add2'] !!}
	</div>
</div>

@endsection
@section('pageLevelScript')
<script type="text/javascript">
    $('.tag-search').keyup(function(){
      var rex = new RegExp($(this).val(), 'i');
        $('.tag').hide();
        $('.tag').filter(function() {
            return rex.test($(this).text());
        }).show();
    });
</script>
@endsection