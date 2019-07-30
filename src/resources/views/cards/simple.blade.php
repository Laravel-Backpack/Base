<div class="{{ $card['wrapperClass'] ?? 'col-sm-6 col-md-4' }}">
	<div class="{{ $card['class'] ?? 'card mb-2' }}">
	  @if (isset($card['content']['header']))
	  <div class="card-header">{!! $card['content']['header'] !!}</div>
	  @endif
	  <div class="card-body">{!! $card['content']['body'] !!}</div>
	</div>
</div>