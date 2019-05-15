<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Language" content="{{ app()->getLocale() }}" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

@if (config('backpack.base.meta_robots_content'))
<meta name="robots" content="{{ config('backpack.base.meta_robots_content', 'noindex, nofollow') }}">
@endif

{{-- Encrypted CSRF token for Laravel, in order for Ajax requests to work --}}
<meta name="csrf-token" content="{{ csrf_token() }}" />

<title>
  {{ isset($title) ? $title.' :: '.config('backpack.base.project_name').' Admin' : config('backpack.base.project_name').' Admin' }}
</title>

@yield('before_styles')
@stack('before_styles')

<!-- Tabler dependencies -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">

<link rel="stylesheet" href="{{ asset('vendor/backpack/pnotify/pnotify.custom.min.css') }}">


<!-- BackPack Base CSS -->
{{-- <link rel="stylesheet" href="{{ asset('vendor/backpack/base/backpack.base.css') }}?v=3">
@if (config('backpack.base.overlays') && count(config('backpack.base.overlays')))
    @foreach (config('backpack.base.overlays') as $overlay)
    <link rel="stylesheet" href="{{ asset($overlay) }}">
    @endforeach
@endif --}}


@yield('after_styles')
@stack('after_styles')

<script src="/packages/backpack/themes/tabler/js/require.min.js"></script>
<link href="/packages/backpack/themes/tabler/css/dashboard.css" rel="stylesheet" />
<script src="/packages/backpack/themes/tabler/js/backpack.js"></script>