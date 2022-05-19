<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::view('/{any}', 'home')
    ->middleware('auth')
    ->where('any', '.*');