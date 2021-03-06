<?php

use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseException;
use Parse\ParseAnalytics;
use Parse\ParseFile;
use Parse\ParseCloud;
use Illuminate\Support\Collection;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Route::get('/', function()
//{
//	return View::make('dashboard.index');
//});
//
//Route::get('/login', function()
//{
//    return View::make('login');
//});

Route::get('/', function()
{
    return Redirect::to('dashboard');
});

Route::get('dashboard', 'DashboardController@index');

Route::get('users', 'UserController@index');
Route::get('user/detail/{id}', 'UserController@userDetail');

Route::get('properties', 'PropertyController@index');
Route::get('addNewProperty', 'PropertyController@addNewProperty');
Route::post('submitNewProperty', 'PropertyController@submitNewProperty');
Route::get('property/detail/{id}', 'PropertyController@editProperty');
Route::post('submitEditProperty', 'PropertyController@submitEditProperty');

Route::get('notifications', 'NotificationController@index');

Route::get('reports', 'ReportController@index');

Route::get('announcement', 'AnnouncementController@index');
Route::get('addAnnouncement', 'AnnouncementController@addAnnounce');
Route::post('submitAnnounce', 'AnnouncementController@submitAnnounce');

Route::get('login', 'HomeController@login');
Route::get('logout', 'HomeController@logout');
Route::post('authen', 'HomeController@authenticate');