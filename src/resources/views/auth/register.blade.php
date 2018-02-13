@extends('backpack::layout_guest')

@section('after_styles')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/dist/css/auth.css">
@endsection

@section('body_attributes')
    register-page
@endsection

@section('login-box')
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url('') }}">{!! config('backpack.base.logo_lg') !!}</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">{{ trans('backpack::base.register') }}</p>
            <form role="form" method="POST" action="{{ route('backpack.auth.register') }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                           placeholder="{{ trans('backpack::base.name') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                           placeholder="{{ trans('backpack::base.email_address') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="{{ trans('backpack::base.password') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="{{ trans('backpack::base.confirm_password') }}">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit"
                        class="btn btn-primary btn-block btn-flat"
                >{{ trans('backpack::base.register') }}</button>
            </form>

            <div class="auth-links">
                <a href="{{ route('backpack.auth.login') }}"
                   class="text-center">{{ trans('backpack::base.login') }}</a>
            </div>
        </div>
    </div>
@endsection

