@extends('backpack::layout')

@section('header')
@endsection


@section('content')
<div class="container">

  <div class="page-header">
    <h1 class="page-title">
      Dashboard
    </h1>
  </div>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ trans('backpack::base.login_status') }}</h3>
      <div class="card-options">
        <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
      </div>
    </div>
    <div class="card-body">
      {{ trans('backpack::base.logged_in') }}
    </div>
  </div>

</div>
@endsection
