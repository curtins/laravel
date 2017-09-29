<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jobs\LoadData;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $this->dispatch(new App\Jobs\LoadData());
        return view('home');
    }
}
