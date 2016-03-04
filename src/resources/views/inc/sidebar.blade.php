@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="http://placehold.it/160x160/00a65a/ffffff/&text={{ Auth::user()->name[0] }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">ADMINISTRATION</li>
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>


          <!-- ======================================= -->
          <li class="header">USER</li>
          <li><a href="{{ url('admin/logout') }}"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif