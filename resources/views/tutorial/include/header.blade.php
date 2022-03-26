<div class="navbar navbar-fixed-top navbar-default">
  	<div class="row-fluid">
    	<div class="col-md-2 logo">
	      	<div class="navbar-header">
	      		<a class="navbar-brand" href="{{ url('/') }}">
	      			<img src="{{ asset('/image/nicesnippets.png') }}" alt="nicesnippets" />
	      		</a>
	      		<a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	          <span class="glyphicon glyphicon-bar"></span>
	          <span class="glyphicon glyphicon-bar"></span>
	          <span class="glyphicon glyphicon-bar"></span>
	        </a>
	      	</div>
  		</div>
  		<div class="col-md-10">
	        <div class="navbar-collapse">
	            <ul class="nav navbar-nav">
	                <li class="active"><a href="{{ route('home') }}">Home</a>
	                </li>
					@foreach($languageData as $key => $value)
						<li><a href="{{ isset($value->tutorialSlug) ? route('tutorialDetails',[$value->slug,$value->tutorialSlug]) : route('tutorial') }}">{{ $value->name }}</a></li>
	                @endforeach
	            </ul>
	        </div>
	    </div>
	</div> 
</div>