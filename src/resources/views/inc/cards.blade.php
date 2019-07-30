@if (isset($section) && isset($cards[$section]) && is_array($cards[$section]) && count($cards[$section]))
	<div class="row">
	@foreach ($cards[$section] as $card)

		@php
	        $cardsViewNamespace = $card['viewNamespace'] ?? 'backpack::cards';
		@endphp

		@include($cardsViewNamespace.'.'.$card['type'], ['card' => $card])

	@endforeach
	</div>
@endif