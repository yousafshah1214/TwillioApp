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


Route::get('login','Auth\LoginController@index')->name('login');

Route::post('login','Auth\LoginController@login');

Route::group(['middleware' => ['auth']], function(){

    Route::get('user/dashboard','DashboardController@index')->name('user.dashboard');

    Route::get('user/conversations','ConversationsController@index')->name('user.conversations.list');

    Route::get('user/conversations/show/{id}','ConversationsController@show')->name('user.conversations.show');

    Route::get('logout','Auth\LogoutController@logout');
});

Route::get('admin/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');

Route::post('admin/login','Auth\AdminLoginController@login');



Route::group(['middleware' => ['auth:admin']], function(){

    Route::get('/', 'HomeController@index');

    Route::get('home', 'HomeController@index');

    Route::get('bulk/sms','BulkSMSController@index');

    Route::get('bulk/import/csv','CsvImportController@create');

    Route::post('bulk/import/csv/upload','CsvImportController@Store');

    Route::get('bulk/sms/send','BulkSMSController@bulkSms');

    Route::resource('user','UserController');

    Route::resource('states','StateController');

    Route::resource('templates','TemplateController');



});

Route::match(['get', 'post'], 'sms/reply', 'SmsController@reply');

// Route::get('bulk/import/excel','BulkSMSController@importExcel');
//
// Route::get('bulk/export/csv','BulkSMSController@exportCsv');
//
// Route::get('bulk/export/excel','BulkSMSController@exportExcel');
