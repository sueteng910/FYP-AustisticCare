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

Route::get('/', 'PagesController@index');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/therapist/home','PagesController@therahome')->middleware('auth','therapist');


Route::get('/therapist/therapistschedule', 'ScheduleController@index');

Route:: get('/admin/home', 'PagesController@adminhome');
Route::resource('/admin/children','ChildrenController');

Route::get('/therapist/children', 'PagesController@therachildren');
Route::get('/therapist/children/calendar/{id}', 'ScheduleController@index');
Route::post('/therapist/children', 'ScheduleController@addEvent')->name('yo');

Route::get('/therapist/schedule', 'ScheduleController@showCalendar');
Route::get('/therapist/children/therapyreports/{id}', 'TherapyController@show');
//Route::post('/admin/adminviewchildren','ChildrenController');


