<ul class="nav navbar-nav d-md-down-none">

  <!-- =================================================== -->
  <!-- ========== Top menu items (ordered left) ========== -->
  <!-- =================================================== -->

  <!-- <li class="nav-item px-3"><a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home"></i><span>Home</span></a></li> -->

  <!-- ========== End of top menu left items ========== -->
</ul>


<ul class="nav navbar-nav ml-auto">
  @if (config('backpack.base.setup_auth_routes'))
    @if (backpack_auth()->guest())
      <li class="nav-item px-3">
        <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/login') }}">{{ trans('backpack::base.login') }}</a>
      </li>
      <li class="nav-item px-3">
        <a href="{{ route('backpack.auth.register') }}">{{ trans('backpack::base.register') }}</a>
      </li>
    @else
      <li class="nav-item dropdown">
        <a aria-expanded="false" aria-haspopup="true" class="nav-link" data-toggle="dropdown" href="#" role="button">
          <img alt="User Image" class="img-avatar" src="{{ backpack_avatar_url(backpack_auth()->user()) }}">
          <i class="fas fa-sort-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header text-center">
            <strong>{{ backpack_auth()->user()->name }}</strong>
          </div>
          <a class="dropdown-item" href="{{ route('backpack.account.info') }}"><i class="fas fa-user"></i> My Account</a>
          <a class="dropdown-item" href="{{ route('backpack.auth.logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
      </li>
    @endif
  @endif
</ul>
