@extends('backpack::layout')

@section('header')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </nav>
    <section class="container-fluid">
      <h1>
        <span class="text-capitalize">{{ trans('backpack::base.dashboard') }}</small>
      </h1>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="box-title">{{ trans('backpack::base.login_status') }}</div>
                </div>

                <div class="card-body">{{ trans('backpack::base.logged_in') }}</div>
            </div>
        </div>
    </div>
@endsection
