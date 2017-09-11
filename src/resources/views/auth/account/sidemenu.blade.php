<div class="box">
	<ul class="nav nav-pills nav-stacked">

	  <li role="presentation"
		@if (url()->current() == backpack_url('edit-account-info'))
	  	class="active"
	  	@endif
	  	><a href="{{ backpack_url('edit-account-info') }}">{{ trans('backpack::base.update_account_info') }}</a></li>

	  <li role="presentation"
		@if (url()->current() == backpack_url('change-password'))
	  	class="active"
	  	@endif
	  	><a href="{{ backpack_url('change-password') }}">{{ trans('backpack::base.change_password') }}</a></li>

	</ul>
</div>