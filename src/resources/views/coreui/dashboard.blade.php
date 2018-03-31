@extends(backpack_theme('layout'))

@section('header')
<!-- Breadcrumb -->
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
  <li class="breadcrumb-item active">{{ trans('backpack::base.dashboard') }}</li>
</ol>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
      {{ trans('backpack::base.login_status') }}
      </div>
      <div class="card-body">
      {{ trans('backpack::base.logged_in') }}
      </div>
    </div>
    <div class="box box-default">
      <div class="box-header with-border">
        <div class="box-title"></div>
      </div>

      <div class="box-body"> COREUI</div>
    </div>
  </div>
</div>
@endsection
