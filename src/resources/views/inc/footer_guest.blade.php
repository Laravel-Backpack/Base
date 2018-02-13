@if (config('backpack.base.show_powered_by'))
        <div class="login-footer">
                {{ trans('backpack::base.powered_by') }} <a target="_blank" href="http://backpackforlaravel.com?ref=panel_footer_link">Backpack for Laravel</a>
        </div>
@endif