<?php

namespace Backpack\Base\app\Http\Controllers\Auth;

use Backpack\Base\app\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

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
        if (config('backpack.base.separate_admin_session')) {
            $this->middleware('guest:'.config('backpack.base.admin_guard.name'), ['except' => 'logout']);
        } else {
            $this->middleware('guest');
        }
    }

    public function guard()
    {
        if (config('backpack.base.separate_admin_session')) {
            return \Auth::guard(config('backpack.base.admin_guard.name'));
        } else {
            return \Auth::guard();
        }
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
}
