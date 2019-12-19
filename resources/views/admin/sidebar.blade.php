<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ Auth::user()->photo->file }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="/admin" class="{{ Request::getPathInfo() == '/admin' ? 'nav-link active' : 'nav-link'}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li
          class="{{ Request::getPathInfo() == '/admin/users' || Request::getPathInfo() == '/admin/users/create' ? 'nav-item has-treeview menu-open' : 'nav-item has-treeview'}}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Users
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('users.index')}}"
                class="{{ Request::getPathInfo() == '/admin/users' ? 'nav-link active' : 'nav-link'}}">
                <i class="far fa-circle nav-icon"></i>
                <p>All User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('users.create')}}"
                class="{{ Request::getPathInfo() == '/admin/users/create' ? 'nav-link active' : 'nav-link'}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add User</p>
              </a>
            </li>
          </ul>
        </li>

        <li
          class="{{ Request::getPathInfo() == '/admin/posts' || Request::getPathInfo() == '/admin/posts/create' ? 'nav-item has-treeview menu-open' : 'nav-item has-treeview'}}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chalkboard"></i>
            <p>
              Posts
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('posts.index')}}"
                class="{{ Request::getPathInfo() == '/admin/posts' ? 'nav-link active' : 'nav-link'}}">
                <i class="far fa-circle nav-icon"></i>
                <p>All Post</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('posts.create')}}"
                class="{{ Request::getPathInfo() == '/admin/posts/create' ? 'nav-link active' : 'nav-link'}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Posts</p>
              </a>
            </li>
          </ul>
        </li>


        <li class="nav-item">
          <a href="{{route('categories.index')}}" class="{{ Request::getPathInfo() == '/admin/categories' ? 'nav-link active' : 'nav-link'}}">
            <i class="nav-icon fas fa-box"></i>
            <p>
              category
            </p>
          </a>
        </li>

        <li
        class="{{ Request::getPathInfo() == '/admin/media' || Request::getPathInfo() == '/admin/media/upload' ? 'nav-item has-treeview menu-open' : 'nav-item has-treeview'}}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-chalkboard"></i>
          <p>
            Media
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('media.index')}}"
              class="{{ Request::getPathInfo() == '/admin/media' ? 'nav-link active' : 'nav-link'}}">
              <i class="far fa-circle nav-icon"></i>
              <p>All Media</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('media.create')}}"
              class="{{ Request::getPathInfo() == '/admin/media/upload' ? 'nav-link active' : 'nav-link'}}">
              <i class="far fa-circle nav-icon"></i>
              <p>Upload Media</p>
            </a>
          </li>
        </ul>
      </li>


        <li class="nav-item">
          <a href={{ route('logout') }} class="nav-link" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Logout
            </p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>