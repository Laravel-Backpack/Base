<div class="navbar-custom-menu pull-left">
    <ul class="nav navbar-nav">
        <!-- =================================================== -->
        <!-- ========== Top menu items (ordered left) ========== -->
        <!-- =================================================== -->

        @if (backpack_auth()->check())
            <!-- Topbar. Contains the left part -->
            @include('backpack::inc.topbar_left_content')
        @endif

    <!-- ========== End of top menu left items ========== -->
    </ul>
</div>


<div class="navbar-custom-menu pull-right">
    <ul class="nav navbar-nav">
        <!-- ========================================================= -->
        <!-- ========= Top menu right items (ordered right) ========== -->
        <!-- ========================================================= -->

        @if (config('backpack.base.setup_auth_routes'))
            @if (backpack_auth()->guest())
                <li>
                    <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/login') }}">{{ trans('backpack::base.login') }}</a>
                </li>
                @if (config('backpack.base.registration_open'))
                    <li><a href="{{ route('backpack.auth.register') }}">{{ trans('backpack::base.register') }}</a></li>
                @endif
            @else
                <!-- Topbar. Contains the right part -->
                @include('backpack::inc.topbar_right_content')
                <li><a href="{{ route('backpack.auth.logout') }}"><i class="fa fa-btn fa-sign-out"></i> {{ trans('backpack::base.logout') }}</a></li>
            @endif
        @endif
        <!-- ========== End of top menu right items ========== -->
    </ul>
</div>
