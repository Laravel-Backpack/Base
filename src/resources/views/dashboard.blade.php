@extends('backpack::layout')

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
