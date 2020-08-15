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
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('employees', 'EmployeeController');
Route::resource('companies', 'CompanyController');

Route::get('/companieslist', 'CompanyController@getCompanies')->name('getCompanies');
Route::get('/employeeslist', 'EmployeeController@getEmployees')->name('getEmployees');