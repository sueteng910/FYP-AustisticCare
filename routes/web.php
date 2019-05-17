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
Route::post('/therapist/children/calendar/{id}', 'ScheduleController@addEvent')->name('yo');

Route::get('/therapist/schedule', 'ScheduleController@showCalendar');
Route::get('/therapist/children/therapyreports/{id}', 'TherapyController@showList');
Route::get('/therapist/children/reports/{id}', 'TherapyController@show');
Route::post('/therapist/children/reports/{id}', 'TherapyController@update')->name('yooo');
Route::get('/therapist/children/homework/{id}', 'HomeworkController@show');
Route::post('/therapist/children/homeworkList/{id}', 'HomeworkController@update')->name('homeworkupdate');
Route::get('/therapist/children/homeworkList/{id}', 'HomeworkController@showList');

Route::get('/therapist/children/profile/{id}', 'PagesController@profile');
Route::post('/therapist/children/profile/{id}', 'PagesController@addGoal');
Route::get('/therapist/reports', 'TherapyController@showAll');

//Route::post('/admin/adminviewchildren','ChildrenController');

Route::get('/mother/home', 'MotherController@motherhome');
Route::get('/mother/validation', 'PagesController@motherValidation');
Route::post('/mother/validation', 'ValidationController@motherValidation');
//Route::get('/mother/successful', 'ValidationController@motherSuccess');
Route::get('/therapist/validation', 'PagesController@validation');
Route::post('/therapist/validation', 'ValidationController@theraValidation');
Route::get('/therapist/successful', 'PagesController@successful');

Route::get('/admin/therapist/validation', 'AdminController@getVerify');
Route::post('/admin/therapist/validation', 'AdminController@verify');

Route::get('/mother/calendar/{id}', 'MotherController@calendar');
Route::get('/mother/homeworkList', 'MotherController@homeworkList');
Route::get('/mother/homework/{id}', 'MotherController@homework');
Route::post('/mother/homework/{id}', 'MotherController@submit');
Route::get('/therapist/children/homeworkReport/{id}', 'HomeworkController@display');

Route::get('/admin/children/profile/{id}', 'AdminController@childrenProfile');
Route::get('/admin/about', 'AdminController@about');
Route::get('/testing', 'TestController@test');