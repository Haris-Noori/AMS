<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	// echo "Ehhlo";
    return view('welcome');
});

// Routes for admin

Route::get('/admin/dash', function () {
    // echo "Ehhlo";
    return view('admin.dashboard');
});

Route::get('/admin/all-admin', function () {
    return view('admin.all-admins');
});

Route::get('/admin/add-admin', function () {
    return view('admin.add-admin');
});

