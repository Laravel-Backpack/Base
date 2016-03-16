<?php

namespace Backpack\Base\app\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Prologue\Alerts\Facades\Alert as Alert;

class AdminController extends Controller
{
    protected $data = [];

    /**
     * Create a new controller instance.
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
        $this->data['title'] = "Dashboard";

        return view('backpack::dashboard', $this->data);
    }
}
