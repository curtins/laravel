<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsheaderController extends Controller
{
    /**
     * Show the newsfeeds.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $headers = newsheaders::all();          
         //return view('home' , compact('headers'));
     }
}
