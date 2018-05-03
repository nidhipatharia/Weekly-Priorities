<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','UserController@index');
Route::post('/','UserController@authenticate')->middleware('cengage');

Route::post('weeklyList/filter', 'WeeklyListController@filter');
Route::get('test','testController@index');
Route::post('testpost','testController@testing');
//Route::post('/weeklyList','WeeklyListController@index');
Route::get('showRoutes', 'WeeklyListController@routes');
Route::resource('weeklyList','WeeklyListController');

/*	
Route::get('/weeklyList/home','WeeklyListController@index');
Route::get('/weeklyList/create','WeeklyListController@create');
Route::post('/weeklyList/store','WeeklyListController@store');
*/

/*if (env('APP_ENV') === 'production') {
    URL::forceSchema('https');
}*/