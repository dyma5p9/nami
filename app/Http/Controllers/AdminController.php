<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
        $this->data = array();
    }

    /**
     * Show the application admin page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->data['users'] = User::with('posts')->get();

        if ($this->data['users']->isEmpty()) {
            abort(404);
        }

        return view('admin.home', $this->data);
    }


}
