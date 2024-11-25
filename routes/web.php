<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('/admin', function () {
    return view('admin.dashboard');
});
Route::get('/skck', function () {
    return view('skck');
});
Route::get('/super', function () {
    return view('admin.super.dashboard');
});
Route::get('/statistic', function () {
    return view('admin.statistic');
});
Route::get('/edit', function () {
    return view('admin.edit');
});