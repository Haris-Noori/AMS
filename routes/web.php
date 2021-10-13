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


// Routes for Admin
//======================================================================
Route::get('/admin', 'AdminController@index');



Route::middleware([AdminAuthGuard::class, XSS::class, 'web'])->group(function () {
    Route::get('/admin/login', "AdminController@login")->withoutMiddleware([AdminAuthGuard::class]);
    Route::post('/admin/login', "AdminController@login")->withoutMiddleware([AdminAuthGuard::class]);
    Route::get('/admin/logout', 'AdminController@logout');
    Route::post('/admin/change-password', 'AdminController@changePassword');

    Route::get('/admin/dashboard', 'AdminController@loadDashboard');
    // admins
    Route::get('/admin/add_admin', 'AdminController@getAddAdminView');
    Route::post('/addNewAdmin', 'AdminController@addNewAdmin');
    Route::get('/admin/all_admins', 'AdminController@getAllAdminsView');
    Route::get('/admin/removeAdmin/{id}', 'AdminController@removeAdmin');

    // students
    Route::get('/admin/add-student', 'AdminController@addStudent');
    Route::post('/admin/add-student', 'AdminController@addStudent');
    Route::get('/admin/all_students', 'AdminController@getAllStudentsView');
    Route::get('/admin/removeStudent/{id}', 'AdminController@removeStudent');

    //employees
    Route::get('/admin/add-employee', 'AdminController@getAddEmployeeView');
    Route::post('/admin/addEmployee', 'AdminController@addEmployee');
    Route::get('/admin/all-employees', 'AdminController@allEmployeesView');
    Route::get('/admin/removeEmployee/{id}', 'AdminController@removeEmployee');
    Route::get('/admin/employees-activities', 'AdminController@employeesActivities');

    //Donations
    Route::get('/admin/add-donation-box', 'AdminController@addDonationBoxView');
    Route::post('/admin/add-donation-box', 'AdminController@addDonationBox');
    Route::get('/admin/all-donation-boxes', 'AdminController@getAllDonationBoxes');
    Route::get('/admin/all-donations', 'AdminController@allDonations');
    Route::post('/admin/search-donations', 'AdminController@searchDonations');
    
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

Route::get('/employee/dashboard', 'EmployeeController@dashboard');

Route::get('/employee/add-activity', 'EmployeeController@getAddActivityView');
Route::post('/employee/add-activity', 'EmployeeController@addActivity');
Route::get('/employee/all-activity', 'EmployeeController@getAllActivityView');
Route::get('/employee/logout', 'EmployeeController@logout');
Route::get('/employee/add-donation', 'EmployeeController@addDonationView');
Route::post('/employee/add-donation', 'EmployeeController@addDonation');
Route::get('/employee/all-donations', 'EmployeeController@allDonations');
Route::post('/employee/change-password', 'EmployeeController@changePassword');


