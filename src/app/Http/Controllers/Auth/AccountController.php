<?php

namespace Backpack\Base\app\Http\Controllers\Auth;

use Auth;
use Form;
use Backpack\Base\app\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $data = [];

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function showEditForm()
    {
        $this->data['title'] = trans('backpack::base.edit_account');
        $this->data['user'] = Auth::guard(config('backpack.base.admin_guard.name'))->user();
        return view('backpack::auth.edit', $this->data);
    }

    public function update()
    {
        //
    }

    public function updatePassword()
    {
        //
    }
}
