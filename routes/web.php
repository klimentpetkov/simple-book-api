<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/storage/{name}', 'ImageController')
    ->where('name', '(.*)')
    ->name('image.get');

Route::view('/{any}', 'home')
    ->middleware('auth')
    ->where('any', '.*')
    ->name('vue.routes');