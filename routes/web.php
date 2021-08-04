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

//Route::get('/userData', function () {
   // return view('registration');
//});
Route::get('/login', 'Auth\AuthController@index');
Route::post('/login', 'Auth\AuthController@postLogin'); 
Route::get('/register', 'Auth\AuthController@register');
Route::post('register', 'Auth\AuthController@postRegister'); 
Route::get('/logout', 'Auth\AuthController@logout');

Route::resource('branchcompanyprofiles', 'CompanyProfile\BranchCompanyProfileController');