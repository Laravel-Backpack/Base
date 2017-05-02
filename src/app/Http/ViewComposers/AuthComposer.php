<?php

namespace Backpack\Base\app\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AuthComposer
{
    public function compose(View $view)
    {
        $guard = config('backpack.base.guard')
            ?: config('auth.defaults.guard');

        $view->with([
            'backpackAuth' => Auth::guard($guard),
        ]);
    }
}
