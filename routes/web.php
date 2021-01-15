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

Route::get('/login', function(){
    return view('login');
});

Route::get('/admin/login', function(){
    return view('admin.login');
});


||||||| merged common ancestors
=======

Route::get('/admin/all-admin', function () {
    return view('admin.all-admins');
});

Route::get('/admin/add-admin', function () {
    return view('admin.add-admin');
});

>>>>>>> 564547ee203087920d86add85de2740db57f3da0
