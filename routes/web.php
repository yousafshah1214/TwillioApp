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

    Route::post('user/sms/send','SmsController@send')->name('user.sms.send');

    Route::get('logout','Auth\LogoutController@logout');
});

Route::get('admin/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');

Route::post('admin/login','Auth\AdminLoginController@login');



Route::group(['middleware' => ['auth:admin']], function(){

    Route::get('/', 'HomeController@index')->name('home.root');

    Route::get('home', 'HomeController@index')->name('home');

    Route::get('bulk/sms','BulkSMSController@index')->name('bulk.sms');

    Route::get('bulk/import/csv','CsvImportController@create');

    Route::post('bulk/import/csv/upload','CsvImportController@Store');

    Route::get('bulk/sms/send','BulkSMSController@bulkSms');

    Route::post('bulk/sms/send','BulkSMSController@bulkSmsSend');

    Route::resource('user','UserController');

    Route::resource('states','StateController');

    Route::resource('templates','TemplateController');

    Route::post('reports/show','ReportController@show')->name('reports.show.post');

    Route::get('/reports/show/{id}','ReportController@show')->name('reports.show');

    Route::resource('reports','ReportController');

    Route::resource('compliance','ComplianceController');

    Route::get('admin/logout','Auth\AdminLogoutController@logout');


});

Route::match(['get', 'post'], 'sms/reply', 'SmsController@reply')->name('user.sms.reply');

// Route::get('bulk/import/excel','BulkSMSController@importExcel');
//
// Route::get('bulk/export/csv','BulkSMSController@exportCsv');
//
// Route::get('bulk/export/excel','BulkSMSController@exportExcel');
