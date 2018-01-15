@extends('backpack::layout')

@section('after_styles')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/dist/css/auth.css">
@endsection

@section('body_attributes')
    login-page
@endsection

@section('login-box')

    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('') }}">{!! config('backpack.base.logo_lg') !!}</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">{{ trans('backpack::base.login') }}</p>

            <form role="form" method="POST" action="{{ route('backpack.auth.login') }}">
                {!! csrf_field() !!}

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

                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> {{ trans('backpack::base.remember_me') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit"
                                class="btn btn-primary btn-block btn-flat">{{ trans('backpack::base.login') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="auth-links">
                <a href="{{ route('backpack.auth.password.reset') }}"
                   class="text-center"
                >{{ trans('backpack::base.forgot_your_password') }}</a>
                <br>
                @if (config('backpack.base.registration_open'))
                    <a href="{{ route('backpack.auth.register') }}"
                       class="text-center"
                    >{{ trans('backpack::base.register') }}</a>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('after_scripts')
    <script src="{{ asset('vendor/adminlte') }}/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
@endsection