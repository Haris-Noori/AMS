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

Route::get('/login', function () {
    return view('login');
});

// Routes for admin
//======================================================================
Route::get('/admin', function(){
    return view('admin.login');
});

Route::get('/admin/insert', 'AdminController@createAdmin');
Route::get('/admin/select', 'AdminController@getAdmins');

// Passing Post Request to login function
Route::post('/admin/login', [AdminController::class, 'login']);

Route::get('/admin/logout', 'AdminController@logout');

Route::get('/admin/dashboard', function(){
    return view('/admin/dashboard');
});

Route::get('/admin/add_admin', 'AdminController@getAddAdminView');

// Passing Post Request to AdminController@addNewAdmin function
Route::post('/addNewAdmin', [AdminController::class, 'addNewAdmin']);

// Get All Admins View
Route::get('/admin/all_admins', 'AdminController@getAllAdminsView');


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




