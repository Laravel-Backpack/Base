@extends('backpack::layout')

@php
  $breadcrumbs = [
      trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
      trans('backpack::base.dashboard') => false,
  ];
@endphp

@section('content')
    <div class="jumbotron">
      <h1 class="display-3">{{ trans('backpack::base.welcome') }}</h1>
      <p>{{ trans('backpack::base.use_sidebar') }}</p>
      <p class="lead">
        <a class="btn btn-primary" href="{{ backpack_url('logout') }}" role="button">{{ trans('backpack::base.logout') }}</a>
      </p>
    </div>
@endsection
