<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//Route::get('/{any}', 'AppController@index')->where('any', '.*');

Route::view('/{any}', 'home')
//    ->middleware('auth')
    ->where('any', '.*');

//Route::get('/{any}', function () {
//    return view('layouts.app');
//})->where('any', '.*');
