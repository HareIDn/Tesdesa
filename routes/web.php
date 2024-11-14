<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('/admin', function () {
    return view('admin');
});
Route::get('/skck', function () {
    return view('skck');
});