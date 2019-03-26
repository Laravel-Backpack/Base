<div class="list-group list-group-transparent mb-0">
	  <a href="{{ route('backpack.account.info') }}"
		@if (Request::route()->getName() == 'backpack.account.info')
	  	class="active list-group-item list-group-item-action"
	  	@else
	  	class="list-group-item list-group-item-action"
	  	@endif
	  	><span class="icon mr-3"><i class="fe fe-user"></i></span>{{ trans('backpack::base.update_account_info') }}</a>

	  <a href="{{ route('backpack.account.password') }}"
		@if (Request::route()->getName() == 'backpack.account.password')
	  	class="active list-group-item list-group-item-action"
	  	@else
	  	class="list-group-item list-group-item-action"
	  	@endif
	  	><span class="icon mr-3"><i class="fe fe-settings"></i></span>{{ trans('backpack::base.change_password') }}</a>
</div>