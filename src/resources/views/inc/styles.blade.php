<link rel="stylesheet" type="text/css" href="{{ asset('packages/backpack/base/css/bundle.css').'?v='.\Backpack\Base\BaseServiceProvider::VERSION }}">

	<!-- BUNDLE CONTENTS -->
	<!-- <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css"> -->
	<!-- <link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css"> -->
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pnotify@4.0.0/dist/PNotifyBrightTheme.css"> -->

	<!-- BackPack Overlays CSS (aka Skins) -->
	@if (config('backpack.base.overlays') && count(config('backpack.base.overlays')))
	    @foreach (config('backpack.base.overlays') as $overlay)
	    <link rel="stylesheet" type="text/css" href="{{ asset($overlay) }}">
	    @endforeach
	@endif