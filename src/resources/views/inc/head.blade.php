<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
@if (config('backpack.base.meta_robots_content'))
<meta name="robots" content="{{ config('backpack.base.meta_robots_content', 'noindex, nofollow') }}">
@endif

{{-- Encrypted CSRF token for Laravel, in order for Ajax requests to work --}}
<meta name="csrf-token" content="{{ csrf_token() }}" />

<title>
  {{ isset($title) ? $title.' :: '.config('backpack.base.project_name') : config('backpack.base.project_name') }}
</title>

@yield('before_styles')
@stack('before_styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('packages/backpack/base/css/bundle.css') }}">

    {{-- BUNDLE CONTENTS --}}
    {{-- uncomment if you want to load assets from CDN --}}
    {{-- <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> --}}

	<!-- PNotify -->
	{{-- <link rel="stylesheet" href="{{ asset('vendor/backpack/pnotify/pnotify.custom.min.css') }}"> --}}

<!-- BackPack Base CSS -->
{{-- <link rel="stylesheet" href="{{ asset('vendor/backpack/base/backpack.base.css') }}?v=3"> --}}
@if (config('backpack.base.overlays') && count(config('backpack.base.overlays')))
    @foreach (config('backpack.base.overlays') as $overlay)
    <link rel="stylesheet" href="{{ asset($overlay) }}">
    @endforeach
@endif


@yield('after_styles')
@stack('after_styles')

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->