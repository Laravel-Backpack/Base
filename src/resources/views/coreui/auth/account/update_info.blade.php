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
  <li class="breadcrumb-item active">{{ trans('backpack::base.dashboard') }}</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
      @include(backpack_theme('auth.account.sidemenu'))
    </div>
    <div class="col-md-6">
      <div class="card">
        <form class="form" action="{{ route('backpack.account.info') }}" method="post">
          {!! csrf_field() !!}
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
                    $label = trans('backpack::base.name');
                    $field = 'name';
                @endphp
                <label class="required">{{ $label }}</label>
                <input required class="form-control" type="text" name="{{ $field }}" value="{{ old($field) ? old($field) : $user->$field }} ">
            </div>

            <div class="form-group">
                @php
                    $label = config('backpack.base.authentication_column_name');
                    $field = backpack_authentication_column();
                @endphp
                <label class="required">{{ $label }}</label>
                <input required class="form-control" type="{{ backpack_authentication_column()=='email'?'email':'text' }}" name="{{ $field }}" value="{{ old($field) ? old($field) : $user->$field }} ">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-success"><span class="ladda-label"><i class="fa fa-save"></i> {{ trans('backpack::base.save') }}</span></button>
            <a href="{{ backpack_url() }}" class="btn btn-default"><span class="ladda-label">{{ trans('backpack::base.cancel') }}</span></a>
          </div>
        </form>
      </div>

    </div>
</div>
@endsection
