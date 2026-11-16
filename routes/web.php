<?php

use Illuminate\Support\Facades\Route;

Route::get('/', "App\Http\Controllers\MainController@list");


Route::match(["get", "post"], '/fuel-1tona', "App\Http\Controllers\MainController@fuel");
