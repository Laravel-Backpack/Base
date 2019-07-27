@extends('backpack::layout')

@section('header')
    @if (config('backpack.base.breadcrumbs'))
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </nav>
    @endif
@endsection

@section('content')
    <div class="jumbotron">
      <h1 class="display-3">{{ trans('backpack::base.welcome') }}</h1>
      <p>{{ trans('backpack::base.use_sidebar') }}</p>
      <p class="lead">
        <a class="btn btn-primary" href="{{ backpack_url('logout') }}" role="button">{{ trans('backpack::base.logout') }}</a>
      </p>
    </div>
@endsection
