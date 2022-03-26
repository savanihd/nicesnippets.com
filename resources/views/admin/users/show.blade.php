@extends($adminTheme)

@section('title')
User Show
@endsection

@section('content')
<section class="content-header">
    <div class="row">
        <div class="col-md-6">
            <h2>Show User</h2>
        </div>
        <div class="col-md-6 text-right content-header-btn">
            <a href="{{ route('users.index') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</section>
<section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              @if(!empty(auth()->user()->avatar))
                  <img src="/upload/{{ auth()->user()->avatar }}" class="profile-user-img img-responsive img-circle" alt=""/>
              @else
                  <img src="{{ asset('user-defualt-images.jpg') }}" class="profile-user-img img-responsive img-circle">
              @endif

              <h3 class="profile-username text-center">{{ $user->name }}</h3>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right">{!! $user->email !!}</a>
                </li>
                <li class="list-group-item">
                  <b>Type</b>
                  @if($user->is_admin == 1)
                      <a class="pull-right"><span class="label label-success">Admin</span></a>
                  @else
                      <a class="pull-right"><span class="label label-primary">User</span></a>
                  @endif
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
         <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Detail</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="post">
                	<div class="row">
                		<div class="col-md-2">
                			<b>Email</b>	
                		</div>
                		<div class="col-md-6">
                			{!! $user->email !!}
                		</div>
                	</div><br>
                  <div class="row">
                    <div class="col-md-2">
                      <b>Type</b>  
                    </div>
                    <div class="col-md-6">
                      @if($user->is_admin == 1)
                          <span class="label label-success">Admin</span>
                      @else
                          <span class="label label-primary">User</span>
                      @endif
                    </div>
                  </div><br>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection