<?php

use Illuminate\Http\Request;

Route::apiResource('books', 'BookController');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
