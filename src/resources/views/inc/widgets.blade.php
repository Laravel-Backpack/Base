@if (isset($section) && isset($widgets[$section]) && is_array($widgets[$section]) && count($widgets[$section]))
	<div class="row">
	@foreach ($widgets[$section] as $widget)

		@php
	        $widgetsViewNamespace = $widget['viewNamespace'] ?? 'backpack::widgets';
		@endphp

		@include($widgetsViewNamespace.'.'.$widget['type'], ['widget' => $widget])

	@endforeach
	</div>
@endif