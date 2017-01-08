@extends('backpack::layout')

@section('after_styles')
<style media="screen">
    .backpack-profile-form .required::after {
        content: ' *';
        color: red;
    }
</style>
@endsection

@section('after_scripts')
<script type="text/javascript">
    jQuery(function($){

        var submitPasswordForm = function (e) {
            e.preventDefault();

            var newPassword = $('#new_password'),
                confirmPassword = $('#new_confirm_password');

            if (!newPassword.val().length || !confirmPassword.val().length) {
                return new PNotify({
                    title: '{{ trans('backpack::base.error') }}',
                    text: '{{ trans('backpack::base.password_empty') }}',
                    type: 'error'
                });
            }

            if (newPassword.val() !== confirmPassword.val()) {

                return new PNotify({
                    title: '{{ trans('backpack::base.error') }}',
                    text: '{{ trans('backpack::base.password_dont_match') }}',
                    type: 'error'
                });
            }

            return $.post('{{ route('backpack.profile.password') }}', {
                password: newPassword.val(),
                confirm_password: confirmPassword.val()
            })
            .done(function (response) {

                $('#change-password-modal').modal('hide');

                return new PNotify({
                    title: '{{ trans('backpack::base.success') }}',
                    text: response.message,
                    type: 'success'
                });
            })
            .fail(function (http) {
                return new PNotify({
                    title: '{{ trans('backpack::base.error') }}',
                    text: http.responseJSON.message || '{{ trans('backpack::base.error') }}',
                    type: 'error'
                });
            });
        }

        $('#change-password-form').on('submit', submitPasswordForm);
        $('#save-password-button').on('click', submitPasswordForm);

        // Reset the form each time the form opens
        $('#change-password-modal').on('hide.bs.modal show.bs.modal', function (e) {
            document.getElementById('change-password-form').reset();
        });
    });
</script>
@endsection

@section('header')
<section class="content-header">

    <h1>
        {{ trans('backpack::base.edit_account') }}
    </h1>

    <ol class="breadcrumb">

        <li>
            <a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a>
        </li>

        <li class="active">
            {{ trans('backpack::base.edit_account') }}
        </li>

    </ol>

</section>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">

        <a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}"><i class="fa fa-angle-double-left"></i> {{ trans('backpack::base.dashboard') }}</a><br><br>

        <form class="form" action="{{ route('backpack.profile.edit') }}" method="post">

            {!! csrf_field() !!}

            <div class="box">

                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('backpack::base.edit_account') }}</h3>
                </div>

                <div class="box-body backpack-profile-form">

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
                        <input required class="form-control" type="text" name="{{ $field }}" value="{{ old($field) ? old($field) : $user[$field] }} ">
                    </div>

                    <div class="form-group">
                        @php
                            $label = trans('backpack::base.email_address');
                            $field = 'email';
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input required class="form-control" type="email" name="{{ $field }}" value="{{ old($field) ? old($field) : $user[$field] }} ">
                    </div>

                    <div class="form-group">
                        <button data-toggle="modal" data-target="#change-password-modal" class="btn btn-primary" type="button" id="change-password-button">{{ trans('backpack::base.change_password') }}</button>
                    </div>

                </div>

                <div class="box-footer">

                    <button type="submit" class="btn btn-success"><span class="ladda-label"><i class="fa fa-save"></i> {{ trans('backpack::base.save') }}</span></button>
                    <a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}" class="btn btn-default"><span class="ladda-label">{{ trans('backpack::base.cancel') }}</span></a>

                </div>
            </div>

        </form>

        <div id="change-password-modal" class="modal fade backpack-profile-form" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">{{ trans('backpack::base.change_password') }}</h4>
                    </div>

                    <div class="modal-body">

                        <form id="change-password-form" class="form" action="{{ route('backpack.profile.password') }}" method="post">

                            <div class="form-group">
                                @php
                                    $label = trans('backpack::base.password');
                                    $field = 'new_password';
                                @endphp
                                <label class="required">{{ $label }}</label>
                                <input autocomplete="new-password" required class="form-control" type="password" name="{{ $field }}" id="{{ $field }}" value="" placeholder="{{ $label }}">
                            </div>

                            <div class="form-group">
                                @php
                                    $label = trans('backpack::base.confirm_password');
                                    $field = 'new_confirm_password';
                                @endphp
                                <label class="required">{{ $label }}</label>
                                <input autocomplete="new-password" required class="form-control" type="password" name="{{ $field }}" id="{{ $field }}" value="" placeholder="{{ $label }}">
                            </div>

                        </form>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('backpack::base.cancel') }}</button>
                        <button id="save-password-button" type="button" class="btn btn-primary">{{ trans('backpack::base.change_password') }}</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
