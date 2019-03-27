@extends('backpack::layout_guest')

@section('content')

<div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                <h3>{{ trans('backpack::base.register') }}</h3>
              </div>
              <form class="card" role="form" method="POST" action="{{ route('backpack.auth.register') }}">
                {!! csrf_field() !!}

                <div class="card-body p-6">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="form-label" for="name_input">{{ trans('backpack::base.name') }} <span class="form-required">*</span></label>

                        <div>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name_input">

                            @if ($errors->has('name'))
                                <span class="help-block text-muted text-red">
                                    {{ $errors->first('name') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has(backpack_authentication_column()) ? ' has-error' : '' }}">
                        <label class="form-label" for="email_input">{{ config('backpack.base.authentication_column_name') }} <span class="form-required">*</span></label>

                        <div>
                            <input type="{{ backpack_authentication_column()=='email'?'email':'text'}}" class="form-control" name="{{ backpack_authentication_column() }}" value="{{ old(backpack_authentication_column()) }}" id="email_input">

                            @if ($errors->has(backpack_authentication_column()))
                                <span class="help-block text-muted text-red">
                                    {{ $errors->first(backpack_authentication_column()) }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="form-label" for="password_input">{{ trans('backpack::base.password') }} <span class="form-required">*</span></label>

                        <div>
                            <input type="password" class="form-control" name="password" id="password_input">

                            @if ($errors->has('password'))
                                <span class="help-block text-muted text-red">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label class="form-label" for="password_confirmation_input">{{ trans('backpack::base.confirm_password') }} <span class="form-required">*</span></label>

                        <div>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation_input">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block text-muted text-red">
                                    {{ $errors->first('password_confirmation') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-block btn-primary">
                                {{ trans('backpack::base.register') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
              <div class="text-center text-muted">
                @if (backpack_users_have_email())
                <div class="text-center m-t-10"><a href="{{ route('backpack.auth.password.reset') }}">{{ trans('backpack::base.forgot_your_password') }}</a></div>
                @endif
                <div class="text-center m-t-10"><a href="{{ route('backpack.auth.login') }}">{{ trans('backpack::base.login') }}</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
