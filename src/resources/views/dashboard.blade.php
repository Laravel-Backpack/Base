@extends('backpack::layout')

@section('page_title')
    Dashboard<small>The first page you see after login.</small>
@endsection

@section('breadcrumbs')
    <li><a href="{{ 'admin' }}">{{ config('base.project_name') }}</a></li>
    <li class="active">Dashboard</li>
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
