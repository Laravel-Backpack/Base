@extends(backpack_theme('layout'))

@section('after_styles')
<style media="screen">
    .backpack-profile-form .required::after {
        content: ' *';
        color: red;
    }
</style>
@endsection

@section('header')
<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
  <li class="breadcrumb-item"><a href="{{ route('backpack.account.info') }}">{{ trans('backpack::base.my_account') }}</a></li>
  <li class="breadcrumb-item active">{{ trans('backpack::base.change_password') }}</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        @include(backpack_theme('auth.account.sidemenu'))
    </div>
    <div class="col-md-6">
      <div class="card">
        <form class="form" action="{{ route('backpack.account.password') }}" method="post">

            {!! csrf_field() !!}

            <div class="box">

                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->count())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        @php
                            $label = trans('backpack::base.old_password');
                            $field = 'old_password';
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input autocomplete="new-password" required class="form-control" type="password" name="{{ $field }}" id="{{ $field }}" value="" placeholder="{{ $label }}">
                    </div>

                    <div class="form-group">
                        @php
                            $label = trans('backpack::base.new_password');
                            $field = 'new_password';
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input autocomplete="new-password" required class="form-control" type="password" name="{{ $field }}" id="{{ $field }}" value="" placeholder="{{ $label }}">
                    </div>

                    <div class="form-group">
                        @php
                            $label = trans('backpack::base.confirm_password');
                            $field = 'confirm_password';
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input autocomplete="new-password" required class="form-control" type="password" name="{{ $field }}" id="{{ $field }}" value="" placeholder="{{ $label }}">
                    </div>

                </div>

                <div class="card-footer">

                    <button type="submit" class="btn btn-success"><span class="ladda-label"><i class="fa fa-save"></i> {{ trans('backpack::base.change_password') }}</span></button>
                    <a href="{{ backpack_url() }}" class="btn btn-default"><span class="ladda-label">{{ trans('backpack::base.cancel') }}</span></a>

                </div>
            </div>

        </form>
      </div>
    </div>
</div>
@endsection
