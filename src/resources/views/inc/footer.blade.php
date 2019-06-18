@if (config('backpack.base.developer_link') && config('backpack.base.developer_name'))
	<div class="text-muted">
    {{ trans('backpack::base.handcrafted_by') }} <a target="_blank" href="{{ config('backpack.base.developer_link') }}">{{ config('backpack.base.developer_name') }}</a>.
    </div>
@endif
@if (config('backpack.base.show_powered_by'))
    <div class="text-muted ml-auto">
      {{ trans('backpack::base.powered_by') }} <a target="_blank" href="http://backpackforlaravel.com?ref=panel_footer_link">Backpack for Laravel</a>
    </div>
@endif