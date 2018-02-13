@extends('backpack::layout_guest')

@section('after_styles')
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
            <p class="login-box-msg">{{ trans('backpack::base.reset_password') }}</p>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form role="form" method="POST" action="{{ route('backpack.auth.password.email') }}">
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

                <button type="submit"
                        class="btn btn-primary btn-block btn-flat"
                ><i class="fa fa-btn fa-envelope"></i> {{ trans('backpack::base.send_reset_link') }}</button>

            </form>
        </div>
    </div>
@endsection
