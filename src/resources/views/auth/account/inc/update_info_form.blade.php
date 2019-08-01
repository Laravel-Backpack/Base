<div class="col-md-12">
    <form class="form" action="{{ route('backpack.account.info') }}" method="post">

        {!! csrf_field() !!}

        <div class="card padding-10">

            <div class="card-header">
                {{ trans('backpack::base.update_account_info') }}
            </div>

            <div class="card-body backpack-profile-form bold-labels">
                <div class="row">
                    <div class="col form-group">
                        @php
                            $label = trans('backpack::base.name');
                            $field = 'name';
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input required class="form-control" type="text" name="{{ $field }}" value="{{ old($field) ? old($field) : $user->$field }}">
                    </div>

                    <div class="col form-group">
                        @php
                            $label = config('backpack.base.authentication_column_name');
                            $field = backpack_authentication_column();
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input required class="form-control" type="{{ backpack_authentication_column()=='email'?'email':'text' }}" name="{{ $field }}" value="{{ old($field) ? old($field) : $user->$field }}">
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success"><span class="ladda-label"><i class="fa fa-save"></i> {{ trans('backpack::base.save') }}</span></button>
                <a href="{{ backpack_url() }}" class="btn btn-default"><span class="ladda-label">{{ trans('backpack::base.cancel') }}</span></a>
            </div>
        </div>

    </form>
</div>