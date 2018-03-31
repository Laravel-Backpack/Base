@push('after_styles')
  <style type="text/css">
  .user-info .img-thumbnail {
    background: #fff;
  }
  .user-info li {
    padding: 0;
  }
  .user-info li a {
    padding: .75rem 1.25rem;
    display: block;
    text-decoration: none;
  }
  .user-info .active a {
    color: #fff;
  }
  </style>
@endpush

<div class="card user-info">
  <div class="card-body">
    <div class="text-center mb-4">
      <img src="{{ backpack_avatar_url(backpack_auth()->user()) }}" class="rounded-circle img-thumbnail" />
      <h3 class="mt-2 text-center">{{ backpack_auth()->user()->name }}</h3>
    </div>

    <ul class="list-group">
      <li class="list-group-item @if (Request::route()->getName() == 'backpack.account.info')active text-white @endif"><a href="{{ route('backpack.account.info') }}">{{ trans('backpack::base.update_account_info') }}</a></li>
        <li class="list-group-item @if (Request::route()->getName() == 'backpack.account.password')active @endif"><a href="{{ route('backpack.account.password') }}">{{ trans('backpack::base.change_password') }}</a></li>
    </ul>

  </div>
</div>
