<?php

namespace Backpack\Base\app\Http\Controllers\Auth;

use Auth;
use Backpack\Base\app\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Validator;

class MyAccountController extends Controller
{
    protected $data = [];

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function showAccountInfoForm()
    {
        $this->data['title'] = trans('backpack::base.my_account');
        $this->data['user'] = Auth::user();

        return view('backpack::auth.account.update_info', $this->data);
    }

    public function showChangePasswordForm()
    {
        $this->data['title'] = trans('backpack::base.my_account');
        $this->data['user'] = Auth::user();

        return view('backpack::auth.account.change_password', $this->data);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'email',
                Rule::unique($user->getTable())->ignore($user->getKey()),
            ],
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        } else {
            $data = $request->except(['_token']);
            $user->update($data);

            \Alert::success(trans('backpack::base.account_updated'))->flash();

            return redirect()->back();
        }
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password'         => 'required|min:6',
            'new_password'         => 'required|min:6',
            'confirm_password'     => 'required|same:new_password|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $user = Auth::user();

            // check old password matches
            if (!Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->withErrors(trans('backpack::base.old_password_wrong'));
            }

            $user->password = Hash::make($request->new_password);
            $user->save();

            \Alert::success(trans('backpack::base.account_updated'))->flash();

            return redirect()->back();
        }
    }
}
