<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('/books', 'BookController')
      ->middleware('auth:api');
