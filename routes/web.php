<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('/admin', function () {
    return view('admin.dashboard');
});
Route::get('/skck', function () {
    return view('civil.form.skck');
});
Route::get('/super', function () {
    return view('admin.super.dashboard');
});
Route::get('/statistic', function () {
    return view('admin.statistic');
});
Route::get('/profile', function () {
    return view('admin.profile');
});
Route::get('/activity', function () {
    return view('admin.super.activity');
});
Route::get('/civil', function () {
    return view('civil.dashboard');
});
Route::get('/domisili', function () {
    return view('civil.form.domisili');
});
Route::get('/sktm', function () {
    return view('civil.form.sktm.selfdata');
});
Route::get('/sktm1', function () {
    return view('civil.form.sktm.familydata');
});
Route::get('/sktm2', function () {
    return view('civil.form.sktm.usage');
});
Route::get('/usaha', function () {
    return view('civil.form.usaha.selfdata');
});
Route::get('/usaha1', function () {
    return view('civil.form.usaha.businessdata');
});
