<?php

namespace Backpack\Base\app\Http\Controllers\Auth;

use Alert;
use Auth;
use Backpack\Base\app\Http\Controllers\Controller;
use Backpack\Base\app\Http\Requests\AccountInfoRequest;
use Backpack\Base\app\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;

class MyAccountController extends Controller
{
    protected $data = [];

    public function __construct()
    {
        $this->middleware(backpack_auth());
    }

    public function getAccountInfoForm()
    {
        $this->data['title'] = trans('backpack::base.my_account');
        $this->data['user'] = Auth::user();

        return view('backpack::auth.account.update_info', $this->data);
    }

    public function postAccountInfoForm(AccountInfoRequest $request)
    {
        Auth::user()->update($request->except(['_token']));

        Alert::success(trans('backpack::base.account_updated'))->flash();

        return redirect()->back();
    }

    public function getChangePasswordForm()
    {
        $this->data['title'] = trans('backpack::base.my_account');
        $this->data['user'] = Auth::user();

        return view('backpack::auth.account.change_password', $this->data);
    }

    public function postChangePasswordForm(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        Alert::success(trans('backpack::base.account_updated'))->flash();

        return redirect()->back();
    }
}
