<div class="row">
	<div class="col-12">
	    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	    	<a class="nav-link {{ (Request::route()->getName() == 'backpack.account.info')?'active':''}}" href="{{ route('backpack.account.info') }}">{{ trans('backpack::base.update_account_info') }}</a>
	    	<a class="nav-link {{ (Request::route()->getName() == 'backpack.account.password')?'active':'' }}" href="{{ route('backpack.account.password') }}">{{ trans('backpack::base.change_password') }}</a>
	    </div>
	</div>
</div>