<div class="header py-4">
  <div class="container">
    <div class="d-flex">
      <a class="header-brand" href="{{ url('') }}">
        {!! config('backpack.base.logo_lg') !!}
      </a>
      <div class="d-flex order-lg-2 ml-auto">
        <div class="dropdown">
          <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
            <span class="avatar" style="background-image: url({{ backpack_avatar_url(backpack_auth()->user()) }})"></span>
            <span class="ml-2 d-none d-lg-block">
              <span class="text-default">{{ backpack_auth()->user()->name }}</span>
              <small class="text-muted d-block mt-1">Logged In <i class="fa fa-angle-down"></i></small>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <a class="dropdown-item" href="{{ route('backpack.account.info') }}">
              <i class="dropdown-icon fe fe-user"></i> {{ trans('backpack::base.my_account') }}
            </a>
            <a class="dropdown-item" href="{{ route('backpack.account.password') }}">
              <i class="dropdown-icon fe fe-settings"></i> {{ trans('backpack::base.change_password') }}
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ backpack_url('logout') }}">
              <i class="dropdown-icon fe fe-log-out"></i> {{ trans('backpack::base.logout') }}
            </a>
          </div>
        </div>
      </div>

      <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
        <span class="header-toggler-icon"></span>
      </a>
    </div>
  </div>
</div>