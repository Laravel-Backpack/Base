{{ trans('backpack::base.click_here_to_reset') }}: <a href="{{ $link = backpack_url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
