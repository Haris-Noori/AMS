<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\AdminController;
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
//======================================================================
Route::get('/admin', function(){
    return view('admin.login');
});

Route::get('/admin/insert', 'AdminController@createAdmin');
Route::get('/admin/select', 'AdminController@getAdmins');

Route::get('/admin/login', 'AdminController@login');

Route::get('/admin/dashboard', function(){
    return view('/admin/dashboard');
});

Route::get('/admin/add_admin', 'AdminController@addAdminView');

// Passing Post Request to AdminController@addNewAdmin function
Route::post('/addNewAdmin', [AdminController::class, 'addNewAdmin']);

Route::get('/admin/all-admin', function () {
    return view('admin.all-admins');
});


// Routes for Faculty
//=======================================================================
Route::get('/faculty', function(){
    return view('faculty/login');
});

Route::get('faculty/login', function(){
    return view('faculty.login');
});


// Routes for Student
//=======================================================================
Route::get('/login', function(){
    return view('login');
});




