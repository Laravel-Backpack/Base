<?php

namespace Backpack\Base\app\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Prologue\Alerts\Facades\Alert as Alert;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('backpack::dashboard');
    }
}
