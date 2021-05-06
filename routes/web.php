<?php

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
Auth::routes();

Route::get('/home', "PanelController@home")->middleware('auth');
Route::get('/record', "RecordController@index")->middleware('auth');

Route::get('/log-out', "PanelController@logout");
Route::post('/user_login', "UserController@user_login");
Route::get('/login_page', "UserController@login_page");
Route::get('/user_talking/{to}', "PanelController@user_talking")->middleware('auth');
Route::get('/manager_talking/{to}', "PanelController@manager_talking")->middleware('auth');

Route::get('/save_talking/{json}', "PanelController@export_pdf")->middleware('auth');

//Route::get('/', 'GuestController@index');
