@extends(backpack_theme('auth.auth_layout'))

@section('content')
  <div class="card-group">
    <div class="card p-4">
      <div class="card-body">
        <h1>{{ trans('backpack::base.reset_password') }}</h1>

        @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif

        <form class="form-horizontal" role="form" method="POST" action="{{ route('backpack.auth.password.email') }}">
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
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block px-4">
                  {{ trans('backpack::base.send_reset_link') }}
              </button>
            </div>
            <div class="col-12 mt-4">
              <a href="{{ route('backpack.auth.login') }}" class="btn btn-success btn-block">{{ trans('backpack::base.login') }}</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
