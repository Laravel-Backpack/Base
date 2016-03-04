<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- Laravel User Account -->
      @if (Auth::guest())
            <li><a href="{{ url('admin/login') }}">Login</a></li>
            <li><a href="{{ url('admin/register') }}">Register</a></li>
        @else
            <li><a href="{{ url('admin/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
            <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('admin/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                </ul>
            </li> -->
        @endif
    </ul>
</div>