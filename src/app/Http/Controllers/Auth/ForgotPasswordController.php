<?php

namespace Backpack\Base\app\Http\Controllers\Auth;

use Backpack\Base\app\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    protected $data = []; // the information we send to the view

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $guard = backpack_guard_name();

        $this->middleware("guest:$guard");
    }

    // -------------------------------------------------------
    // Laravel overwrites for loading backpack views
    // -------------------------------------------------------

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        $this->data['title'] = trans('backpack::base.reset_password'); // set the page title

        return view('backpack::auth.passwords.email', $this->data);
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        $passwords = config('backpack.base.passwords', config('auth.defaults.passwords'));

        return Password::broker($passwords);
    }
}
