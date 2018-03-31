@extends(backpack_theme('auth.auth_layout'))

@section('content')
  <div class="card-group">
    <div class="card p-4">
      <div class="card-body">
        <h1>{{ trans('backpack::base.login') }}</h1>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('backpack.auth.password.reset') }}">
          {!! csrf_field() !!}
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-at"></i></span>
            </div>
            <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
            <input type="password" class="form-control" name="password" placeholder="{{ trans('backpack::base.password') }}">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
            <input type="password_confirmation" class="form-control" name="password_confirmation" placeholder="{{ trans('backpack::base.confirm_password') }}">

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
          </div>
          <div class="row">
            <div class="col-6">
              <button type="submit" class="btn btn-primary px-4">
                  {{ trans('backpack::base.login') }}
              </button>
            </div>
            @if (backpack_users_have_email())
            <div class="col-6 text-right">

              <a class="btn btn-link" href="{{ route('backpack.auth.password.reset') }}">{{ trans('backpack::base.forgot_your_password') }}</a>
            </div>
            <div class="col-12 mt-4">
              <a href="{{ route('backpack.auth.register') }}" class="btn btn-success btn-block">{{ trans('backpack::base.register') }}</a>
            </div>
            @endif
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
