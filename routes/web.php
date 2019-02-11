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


Auth::routes();

Route::get('/', 'WeatherController@home')->name('weather');

Route::get('/list', 'FeedbackController@list')->middleware('auth')->name('list');

Route::get('/feedback', 'FeedbackController@writeNew');

Route::post('/feedback', 'FeedbackController@publish')->name('feedback');

Route::get('/sent', 'FeedbackController@sent')->name('sent');
