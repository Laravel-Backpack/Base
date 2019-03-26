@extends('backpack::layout_guest')

@section('content')
<div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                <h4>{{ trans('backpack::base.login') }}</h4>
              </div>
              <form class="card" role="form" method="POST" action="{{ route('backpack.auth.login') }}">
                {!! csrf_field() !!}
                <div class="card-body p-6">
                  <div class="form-group {{ $errors->has($username) ? ' has-error' : '' }}">
                    <label class="form-label">{{ config('backpack.base.authentication_column_name') }}</label>
                    <input type="text" name="{{ $username }}" value="{{ old($username) }}" class="form-control" placeholder="{{ config('backpack.base.authentication_column_name') }}">

                    @if ($errors->has($username))
                        <span class="help-block text-muted text-red">
                            {{ $errors->first($username) }}
                        </span>
                    @endif
                  </div>

                  <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="form-label">
                      {{ trans('backpack::base.password') }}
                      @if (backpack_users_have_email())
                      <a href="{{ route('backpack.auth.password.reset') }}" class="float-right small">{{ trans('backpack::base.forgot_your_password') }}</a>
                      @endif
                    </label>
                    <input type="password" name="password" class="form-control" placeholder="{{ trans('backpack::base.password') }}">

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