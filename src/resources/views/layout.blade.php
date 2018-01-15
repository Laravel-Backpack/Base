<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('backpack::inc.head')
</head>
<body class="hold-transition @if (\Illuminate\Support\Facades\View::hasSection('login-box')) @yield('body_attributes') @else {{ config('backpack.base.skin') }} sidebar-mini @endif">

@if (\Illuminate\Support\Facades\View::hasSection('login-box'))
    @yield('login-box')
@else
    <script type="text/javascript">
        /* Recover sidebar state */
        (function () {
            if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
                var body = document.getElementsByTagName('body')[0];
                body.className = body.className + ' sidebar-collapse';
            }
        })();
    </script>
    <!-- Site wrapper -->
    <div class="wrapper">

    @include('backpack::inc.main_header')

    <!-- =============================================== -->

    @include('backpack::inc.sidebar')

    <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
        @yield('header')

        <!-- Main content -->
            <section class="content">

                @yield('content')

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            @if (config('backpack.base.show_powered_by'))
                <div class="pull-right hidden-xs">
                    {{ trans('backpack::base.powered_by') }} <a target="_blank" href="http://backpackforlaravel.com?ref=panel_footer_link">Backpack for Laravel</a>
                </div>
            @endif
            {{ trans('backpack::base.handcrafted_by') }} <a target="_blank" href="{{ config('backpack.base.developer_link') }}">{{ config('backpack.base.developer_name') }}</a>.
        </footer>
    </div>
    <!-- ./wrapper -->


@endif

@yield('before_scripts')

@include('backpack::inc.scripts')

@include('backpack::inc.alerts')

@yield('after_scripts')

<!-- JavaScripts -->
{{-- <script src="{{ mix('js/app.js') }}"></script> --}}

</body>
</html>
