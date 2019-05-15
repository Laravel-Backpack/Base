@extends('backpack::layout_guest')

@section('content')
<div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                <h3>{{ trans('backpack::base.login') }}</h3>
              </div>
              <form class="card" role="form" method="POST" action="{{ route('backpack.auth.login') }}">
                {!! csrf_field() !!}
                <div class="card-body p-6">
                  <div class="form-group {{ $errors->has($username) ? ' has-error' : '' }}">
                    <label class="form-label" for="name_input">{{ config('backpack.base.authentication_column_name') }} <span class="form-required">*</span></label>
                    <input type="text" name="{{ $username }}" value="{{ old($username) }}" class="form-control" id="name_input">

                    @if ($errors->has($username))
                        <span class="help-block text-muted text-red">
                            {{ $errors->first($username) }}
                        </span>
                    @endif
                  </div>

                  <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="form-label" for="password_input">{{ trans('backpack::base.password') }} <span class="form-required">*</span></label>
                    <input type="password" name="password" class="form-control" id="password_input">

                    @if ($errors->has('password'))
                        <span class="help-block text-muted text-red">
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" />
                      <span class="custom-control-label">{{ trans('backpack::base.remember_me') }}</span>
                    </label>
                  </div>

                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">{{ trans('backpack::base.login') }}</button>
                  </div>

                </div>
              </form>
              <div class="text-center text-muted">
                @if (backpack_users_have_email())
                  <a href="{{ route('backpack.auth.password.reset') }}">{{ trans('backpack::base.forgot_your_password') }}</a>
                @endif
                @if (config('backpack.base.registration_open'))
                    <div class="text-center m-t-10"><a href="{{ route('backpack.auth.register') }}">{{ trans('backpack::base.register') }}</a></div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection