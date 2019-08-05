@if (!empty($widgets))
	@foreach ($widgets as $widget)

		@php
	        $widgetsViewNamespace = $widget['viewNamespace'] ?? 'backpack::widgets';
		@endphp

		@include($widgetsViewNamespace.'.'.$widget['type'], ['widget' => $widget])

	@endforeach
@endif