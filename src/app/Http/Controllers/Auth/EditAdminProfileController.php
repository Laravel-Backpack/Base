<?php

namespace Backpack\Base\app\Http\Controllers\Auth;

use Auth;
use Form;
use Validator;
use Backpack\Base\app\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class EditAdminProfileController extends Controller
{
    protected $data = [];

    public function __construct()
    {
        if (config('backpack.base.separate_admin_session')) {
            $this->middleware('backpack.admin.guard');
        } else {
            $this->middleware('admin');
        }
    }

    public function showEditForm()
    {
        $this->data['title'] = trans('backpack::base.edit_account');
        $this->data['user'] = Auth::guard(config('backpack.base.admin_guard.name'))->user();
        return view('backpack::auth.edit', $this->data);
    }

    public function update(Request $request)
    {
        $user = Auth::guard(config('backpack.base.admin_guard.name'))->user();

        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'email',
                Rule::unique($user->getTable())->ignore($user->getKey())
            ],
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
            ->route('backpack.profile.edit')
            ->withErrors($validator)
            ->withInput($request->all());
        } else {
            $data = $request->except(['_token']);
            $user->update($data);

            return redirect()
            ->route('backpack.profile.edit')
            ->with('success', trans('backpack::base.account_updated'));
        }
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password|min:6',
        ]);

        if ($validator->fails()) {
            return response([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        } else {
            $user = Auth::guard(config('backpack.base.admin_guard.name'))->user();
            $user->password = Hash::make($request->password);
            $user->save();

            return response([
                'success' => true,
                'message' => trans('backpack::base.password_updated')
            ]);
        }
    }
}
