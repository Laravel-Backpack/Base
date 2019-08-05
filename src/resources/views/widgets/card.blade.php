<div class="{{ $widget['wrapperClass'] ?? 'col-sm-6 col-md-4' }}">
	<div class="{{ $widget['class'] ?? 'card mb-2' }}">
	  @if (isset($widget['content']['header']))
	  <div class="card-header">{!! $widget['content']['header'] !!}</div>
	  @endif
	  <div class="card-body">{!! $widget['content']['body'] !!}</div>
	</div>
</div>