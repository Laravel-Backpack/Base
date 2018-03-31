@extends(backpack_theme('auth.auth_layout'))

@section('content')
  <div class="card-group">
    <div class="card p-4">
      <div class="card-body">
        <h1>{{ trans('backpack::base.login') }}</h1>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('backpack.auth.login') }}">
          {!! csrf_field() !!}
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control{{ $errors->has(backpack_authentication_column()) ? ' is-invalid' : '' }}" placeholder="{{ config('backpack.base.authentication_column_name') }}" name="{{ backpack_authentication_column() }}" value="{{ old(backpack_authentication_column()) }}">

            @if ($errors->has(backpack_authentication_column()))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first(backpack_authentication_column()) }}</strong>
                </span>
            @endif
          </div>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ trans('backpack::base.password') }}" name="password">
            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group mb-4">
            <div class="col-form-label">
              <div class="form-check checkbox">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">{{ trans('backpack::base.remember_me') }}</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <button type="submit" class="btn btn-primary px-4">
                  {{ trans('backpack::base.login') }}
              </button>
            </div>
            <div class="col-6 text-right">

              <a class="btn btn-link" href="{{ route('backpack.auth.password.reset') }}">{{ trans('backpack::base.forgot_your_password') }}</a>
            </div>
            <div class="col-12 mt-4">
              <a href="{{ route('backpack.auth.register') }}" class="btn btn-success btn-block">{{ trans('backpack::base.register') }}</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
