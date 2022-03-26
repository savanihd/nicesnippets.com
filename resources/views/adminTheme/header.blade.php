<header class="main-header">
  <!-- Logo -->
  <a href="{{ route('admin.home') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>N</b>ice</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Nicesnippets</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            @if(!empty(auth()->user()->avatar))
                <img src="/upload/user/{{ auth()->user()->avatar }}" class="user-image" alt=""/>
            @else
                <img src="{{ asset('user-defualt-images.jpg') }}" class="user-image">
            @endif
            <span class="hidden-xs">{{ auth()->user()->name }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              @if(!empty(auth()->user()->avatar))
                <img src="/upload/user/{{ auth()->user()->avatar }}" class="img-circle" alt=""/>
              @else
                  <img src="{{ asset('user-defualt-images.jpg') }}" class="user-image">
              @endif
              <p>
                {{ auth()->user()->name }}
              </p>
            </li>
            <!-- Menu Body
            <!-- <li class="user-body">
              <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Friends</a>
                </div>
              </div> -->
              <!-- /.row
            </li> -->
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="{{ route('front.settings') }}" class="btn btn-default btn-flat">Settings</a>
              </div>
              <div class="pull-right">
                <a href="{{ route('logout') }}" class="btn btn-default btn-flat" 
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>