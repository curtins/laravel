<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Header;
use App\Detail;

Horizon::auth(function ($request) {
    return true;
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/headers', function () {   
    
    $headers = Header::all();  
    return view('headers',compact('headers'));
    //dd($headers);
});

Route::get('/report', function () {  
    
    $header = DB::table('headers')
    ->select('id','title', 'feed')
    ->groupBy('feed')

    ->get();

    $details = DB::table('details')
    ->select('header_id','itemid', 'title', 'summary')
    ->get();

    

    return view('reports')->with('header', $header);

    //$reflection = new ReflectionClass('App\newsheader');  //  inspect the methods and constants of any class!
    
     

    /*
    $headers = newsheader::all();  

    foreach($headers as $header)
    {

        echo $header->title;


    }

    //return view('headers',compact('headers'));
    //dd($headers);
    */
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
