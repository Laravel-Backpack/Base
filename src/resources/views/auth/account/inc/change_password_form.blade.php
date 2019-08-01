<div class="col-md-12">
    <form class="form" action="{{ route('backpack.account.password') }}" method="post">

        {!! csrf_field() !!}

        <div class="card padding-10">

            <div class="card-header">
                {{ trans('backpack::base.change_password') }}
            </div>

            <div class="card-body backpack-profile-form bold-labels">
                <div class="row">
                    <div class="col form-group">
                        @php
                            $label = trans('backpack::base.old_password');
                            $field = 'old_password';
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input autocomplete="new-password" required class="form-control" type="password" name="{{ $field }}" id="{{ $field }}" value="">
                    </div>

                    <div class="col form-group">
                        @php
                            $label = trans('backpack::base.new_password');
                            $field = 'new_password';
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input autocomplete="new-password" required class="form-control" type="password" name="{{ $field }}" id="{{ $field }}" value="">
                    </div>

                    <div class="col form-group">
                        @php
                            $label = trans('backpack::base.confirm_password');
                            $field = 'confirm_password';
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input autocomplete="new-password" required class="form-control" type="password" name="{{ $field }}" id="{{ $field }}" value="">
                    </div>
                </div>
            </div>

            <div class="card-footer">
                    <button type="submit" class="btn btn-success"><span class="ladda-label"><i class="fa fa-save"></i> {{ trans('backpack::base.change_password') }}</span></button>
                    <a href="{{ backpack_url() }}" class="btn btn-default"><span class="ladda-label">{{ trans('backpack::base.cancel') }}</span></a>
            </div>

        </div>

    </form>
</div>