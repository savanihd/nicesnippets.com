<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        @if(!empty(auth()->user()->avatar))
          <img src=" /upload/user/{{ auth()->user()->avatar }}" class="img-circle" alt="" style="height: 47px;width: 47px;" />
        @else
            <img src="{{ asset('user-defualt-images.jpg') }}" class="user-image">
        @endif
      </div>
      <div class="pull-left info">
        <p>{{ auth()->user()->name }} </p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <!-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form> -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="{{ Request::is('admin/home*') ? 'active' : '' }}">
        <a href="{{ URL::route('admin.home') }}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="{{ Request::is('users*') ? 'active' : '' }}">
        <a href="{{ URL::route('users.index') }}">
          <i class="fa fa-user"></i> <span>User</span>
        </a>
      </li>
      <li class="{{ Request::is('posts*') ? 'active' : '' }}">
        <a href="{{ URL::route('posts.index') }}">
          <i class="fa fa-th"></i> <span>Post</span>
        </a>
      </li>
      <li class="{{ Request::is('tags') ? 'active' : '' }}">
        <a href="{{ URL::route('tags.index') }}">
          <i class="fa fa-th"></i> <span>Update Post</span>
        </a>
      </li>
      <li class="{{ Request::is('tags-crud*') ? 'active' : '' }}">
        <a href="{{ URL::route('tags-crud.index') }}">
          <i class="fa fa-tags"></i> <span>Tag</span>
        </a>
      </li>
      <li class="{{ Request::is('languages*') ? 'active' : '' }}">
        <a href="{{ URL::route('languages.index') }}">
          <i class="fa fa-language"></i> <span>Language</span>
        </a>
      </li>
      <li class="{{ Request::is('tutorials*') ? 'active' : '' }}">
        <a href="{{ URL::route('tutorials.index') }}">
          <i class="fa fa-book"></i> <span>Tutorial</span>
        </a>
      </li>
      <li class="{{ Request::is('category-blog*') ? 'active' : '' }}">
        <a href="{{ URL::route('category-blog.index') }}">
          <i class="fa fa-th"></i> <span>Blog Category</span>
        </a>
      </li>
      <li class="{{ Request::is('blogs*') ? 'active' : '' }}">
        <a href="{{ URL::route('blogs.index') }}">
          <i class="fa fa-pencil"></i> <span>Blog</span>
        </a>
      </li>
      <li class="{{ Request::is('images*') ? 'active' : '' }}">
        <a href="{{ URL::route('images.index') }}">
          <i class="fa fa-picture-o" aria-hidden="true"></i> <span>Image</span>
        </a>
      </li>
      <li class="{{ Request::is('auto-post*') ? 'active' : '' }}">
        <a href="{{ URL::route('admin.autoPost') }}">
          <i class="fa fa-th"></i> <span>Auto Generate Post</span>
        </a>
      </li>
      <li class="{{ Request::is('db-backup*') ? 'active' : '' }}">
        <a href="{{ URL::route('admin.backup') }}">
          <i class="fa fa-database"></i> <span>Database</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>