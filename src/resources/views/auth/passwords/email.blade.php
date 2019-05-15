@extends('backpack::layout_guest')

<!-- Main Content -->
@section('content')

<div class="page">
    <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
                <div class="text-center mb-6">
                    <h3>{{ trans('backpack::base.reset_password') }}</h3>
                    <span class="text-muted"><strong>{{ trans('backpack::base.step') }} 1/2.</strong> {{ trans('backpack::base.confirm_email') }}</a></span>
                </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @else
                    <div class="card">
                        <div class="card-body">

                            <form class="col-md-12 p-t-10" role="form" method="POST" action="{{ route('backpack.auth.password.email') }}">
                                {!! csrf_field() !!}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="form-label">{{ trans('backpack::base.email_address') }} <span class="form-required">*</span></label>

                                    <div>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-block btn-primary">
                                            {{ trans('backpack::base.send_reset_link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                @endif


                  <div class="text-center m-t-10">
                    <a href="{{ route('backpack.auth.login') }}">{{ trans('backpack::base.login') }}</a>

                    @if (config('backpack.base.registration_open'))
                    / <a href="{{ route('backpack.auth.register') }}">{{ trans('backpack::base.register') }}</a>
                    @endif
                  </div>

            </div>
          </div>
        </div>
    </div>
</div>
@endsection
