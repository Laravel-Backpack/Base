<footer class="footer">
	<div class="container">
	  <div class="row align-items-start">
	    <div class="col-md-6">
	    	@if (config('backpack.base.developer_link') && config('backpack.base.developer_name'))
			    {{ trans('backpack::base.handcrafted_by') }} <a target="_blank" href="{{ config('backpack.base.developer_link') }}">{{ config('backpack.base.developer_name') }}</a>.
			@endif
	    </div>
		@if (config('backpack.base.show_powered_by'))
		<div class="col-md-6 text-right d-none d-md-block d-lg-block">
		  {{ trans('backpack::base.powered_by') }} <a target="_blank" href="http://backpackforlaravel.com?ref=panel_footer_link">Backpack for Laravel</a>
		</div>
		@endif
	  </div>
	</div>
</footer>