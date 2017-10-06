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

use App\newsheader;

Horizon::auth(function ($request) {
    return true;
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/headers', function () {   
    
    $headers = newsheader::all();  
    return view('headers',compact($headers));
    //dd($headers);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
