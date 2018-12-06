@if (config('backpack.base.show_powered_by'))
    <div class="pull-right hidden-xs">
      {{ trans('backpack::base.powered_by') }} <a target="_blank" href="http://backpackforlaravel.com?ref=panel_footer_link">Backpack for Laravel</a>
    </div>
@endif
@if (config('backpack.base.developer_link') && config('backpack.base.developer_name'))
    {{ trans('backpack::base.handcrafted_by') }} <a target="_blank" href="{{ config('backpack.base.developer_link') }}">{{ config('backpack.base.developer_name') }}</a>.
@endif
