@if (backpack_auth()->check())
    <!-- Left side column. contains the sidebar -->
    <div class="sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <nav class="sidebar-nav">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="nav">
          {{-- <li class="header">{{ trans('backpack::base.administration') }}</li> --}}
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->

          @include('backpack::inc.sidebar_content')

          <!-- ======================================= -->
          {{-- <li class="header">Other menus</li> --}}
        </ul>
      </nav>
      <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      <!-- /.sidebar -->
    </div>
@endif
