@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Dashboard<small>The first page you see after login.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ 'admin' }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Login status</div>
                </div>

                <div class="box-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
@endsection
