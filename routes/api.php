<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/authors', 'AuthorController');
Route::apiResource('/books', 'BookController');

Route::middleware('auth:api')->group(function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
