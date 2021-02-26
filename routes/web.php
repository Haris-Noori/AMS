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

// Larvael Home Page
Route::get('/', function () {
	// echo "Ehhlo";
    return view('welcome');
});

// Routes for admin
Route::get('/admin', function(){
    return view('admin.login');
});

Route::get('/admin/insert', 'AdminController@createAdmin');
Route::get('/admin/select', 'AdminController@getAdmins');

Route::get('/admin/login', 'AdminController@login');

Route::get('/admin/dashboard', function(){
    return view('/admin/dashboard');
});

// Routes for Faculty
Route::get('/faculty', function(){
    return view('faculty/login');
});

// Routes for Student
Route::get('/login', function(){
    return view('login');
});





Route::get('/admin/all-admin', function () {
    return view('admin.all-admins');
});

Route::get('/admin/add-admin', function () {
    return view('admin.add-admin');
});

Route::get('faculty/login', function(){
    return view('faculty.login');
});
