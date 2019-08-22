@if (config('backpack.base.breadcrumbs') && isset($breadcrumbs) && is_array($breadcrumbs) && count($breadcrumbs))
	<nav aria-label="breadcrumb" class="d-none d-lg-block">
	  <ol class="breadcrumb bg-transparent justify-content-end p-0">
	  	@foreach ($breadcrumbs as $label => $link)
	  		@if ($link)
			    <li class="breadcrumb-item text-capitalize"><a href="{{ $link }}">{{ $label }}</a></li>
	  		@else
			    <li class="breadcrumb-item text-capitalize active" aria-current="page">{{ $label }}</li>
	  		@endif
	  	@endforeach
	  </ol>
	</nav>
@endif