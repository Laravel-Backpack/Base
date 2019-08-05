<div class="{{ $widget['wrapperClass'] ?? '' }}">
	<div class="jumbotron">

	  @if (isset($widget['heading']))
	  <h1 class="display-3">{!! $widget['heading'] !!}</h1>
	  @endif

	  @if (isset($widget['content']))
	  <p>{!! $widget['content'] !!}</p>
	  @endif

	  @if (isset($widget['button_link']))
	  <p class="lead">
	    <a class="btn btn-primary" href="{{ $widget['button_link'] }}" role="button">{{ $widget['button_text'] }}</a>
	  </p>
	  @endif
	</div>
</div>