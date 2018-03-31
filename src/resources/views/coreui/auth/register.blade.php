@extends(backpack_theme('auth.auth_layout'))

@section('content')
    <div class="card p-4">
      <div class="card-body">
        <h1>{{ trans('backpack::base.register') }}</h1>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('backpack.auth.register') }}">
          {!! csrf_field() !!}
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ trans('backpack::base.name') }}" name="name" value="{{ old('name') }}">

            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-at"></i></span>
            </div>
            <input type="{{ backpack_authentication_column()=='email'?'email':'text'}}" class="form-control" placeholder="{{ config('backpack.base.authentication_column_name') }}" name="{{ backpack_authentication_column() }}" value="{{ old(backpack_authentication_column()) }}">

            @if ($errors->has(backpack_authentication_column()))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first(backpack_authentication_column()) }}</strong>
                </span>
            @endif
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-asterisk"></i></span>
            </div>
            <input type="password" class="form-control" name="password" placeholder="{{ trans('backpack::base.password') }}">

            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-asterisk"></i></span>
            </div>
            <input type="password" class="form-control" name="password_confirmation" placeholder="{{ trans('backpack::base.confirm_password') }}">

            @if ($errors->has('password_confirmation'))
                <span class="invalid-password">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block px-4">
                  {{ trans('backpack::base.register') }}
              </button>
              <a href="{{ route('backpack.auth.login') }}" class="btn btn-success btn-block">{{ trans('backpack::base.login') }}</a>
            </div>

          </div>
        </form>
      </div>
    </div>
@endsection
