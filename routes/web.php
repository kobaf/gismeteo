<?php

use App\User, App\Http\Controllers\UsersController;
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


Route::get('/testuser', function ()
{
    $user = new User;

    $user->name = "Testuser";
    $user->surname = "Testusersur";
    $user->email = "abc@abc.com";
    $user->man = true;
    $user->birthday = '2001-01-01';
    $user->password =  Hash::make("password");
    $user->save();

    return "Test user saved in DB";


});

Route::get('/test', 'UserController@test');

Route::get('/list', 'UserController@list');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');