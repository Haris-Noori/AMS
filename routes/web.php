<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Middleware\AdminAuthGuard;
use App\Http\Middleware\XSS;
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
Route::get('/', 'AdminController@index');

Route::get('/login', function () {
    return view('login');
});


// Routes for admin
//======================================================================
Route::get('/admin', 'AdminController@index');



Route::middleware([AdminAuthGuard::class, XSS::class, 'web'])->group(function () {
    Route::get('/admin/login', "AdminController@login")->withoutMiddleware([AdminAuthGuard::class]);
    Route::post('/admin/login', "AdminController@login")->withoutMiddleware([AdminAuthGuard::class]);
    Route::get('/admin/logout', 'AdminController@logout');
    Route::get('/admin/dashboard', 'AdminController@loadDashboard');
    // admins
    Route::get('/admin/insert', 'AdminController@createAdmin');
    Route::get('/admin/select', 'AdminController@getAdmins');
    Route::get('/admin/add_admin', 'AdminController@getAddAdminView');
    Route::post('/addNewAdmin', 'AdminController@addNewAdmin');
    Route::get('/admin/all_admins', 'AdminController@getAllAdminsView');
    Route::get('/admin/removeAdmin/{id}', 'AdminController@removeAdmin');
    // students
    Route::get('/admin/add-student', 'AdminController@addStudent');
    Route::post('/admin/add-student', 'AdminController@addStudent');
    Route::get('/admin/all_students', 'AdminController@getAllStudentsView');
    //employees
    Route::get('/admin/add_employee', 'AdminController@getAddEmployeeView');
    Route::post('/admin/addEmployee', 'AdminController@addEmployee');

    //Donations
    Route::get('/admin/add-donation', 'AdminController@getAddDonationView');
    Route::get('/admin/all-donation', 'AdminController@getAllDonationView');
    
});

// Routes for Faculty
//=======================================================================
Route::get('/faculty', function(){
    return view('faculty.login');
});

Route::get('faculty/login', function(){
    return view('faculty.login');
});


// Routes for Student
//=======================================================================
Route::get('/login', function(){
    return view('login');
});

// Routes for Employee
//=======================================================================
Route::get('/employee/login', function(){
    return view('employee.login');
});

Route::post('/employee/login', 'EmployeeController@login');

Route::get('/employee/index', function(){
    return view('employee.index');
});

Route::get('/employee/dashboard', function(){
    return view('employee.dashboard');
});

Route::get('/employee/add-activity', 'EmployeeController@getAddActivityView');
Route::get('/employee/all-activity', 'EmployeeController@getAllActivityView');
