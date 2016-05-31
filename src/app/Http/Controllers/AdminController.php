<?php

namespace Backpack\Base\app\Http\Controllers;

class AdminController extends Controller
{
    protected $data = []; // the information we send to the view

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
        $this->data['title'] = 'Dashboard'; // set the page title

        return view('backpack::dashboard', $this->data);
    }

    /**
     * Redirect the admin dashboard.
     * The '/admin' route is not to be used, because it breaks the menu's active state.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToDashboard()
    {
        return redirect('admin/dashboard');
    }
}
