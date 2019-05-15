@extends('backpack::layout_guest')

@section('content')

<div class="page">
    <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
                <div class="text-center mb-6">
                    <h3>{{ trans('backpack::base.reset_password') }}</h3>
                    <span class="text-muted"><strong>{{ trans('backpack::base.step') }} 2/2.</strong> {{ trans('backpack::base.choose_new_password') }}</a></span>
                </div>

                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="col-md-12 p-t-10" role="form" method="POST" action="{{ route('backpack.auth.password.reset') }}">
                            {!! csrf_field() !!}

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="form-label" for="email_input">{{ trans('backpack::base.email_address') }} <span class="form-required">*</span></label>

                                <div>
                                    <input type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" id="email_input">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="form-label" for="new_password_input">{{ trans('backpack::base.new_password') }} <span class="form-required">*</span></label>

                                <div>
                                    <input type="password" class="form-control" name="password" id="new_password_input">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="form-label" for="confirm_new_password_input">{{ trans('backpack::base.confirm_new_password') }} <span class="form-required">*</span></label>
                                <div>
                                    <input type="password" class="form-control" name="password_confirmation" id="confirm_new_password_input">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-block btn-primary">
                                        {{ trans('backpack::base.change_password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
          </div>
        </div>
    </div>
</div>



@endsection
